<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\EmployeePayout;
use App\Models\EmployeeDeduction;
use App\Notifications\PayoutInvoice; 
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $user = $this->checkUserSession();
        $employees = Employee::where('company_id', $user->company->id)->get();
        $users = User::all();

        return view('pages.employee', compact('employees', 'users'));
    }

    public function createEmployee(Request $request)
    {
        $user = $this->checkUserSession();
        $employee = Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'position' => ['required', 'string',],
            'rate' => ['required', 'string',],
        ])->validate();

        // Check if exists
        $check = Employee::where('user_id', $request->user_id)->where('position', $request->position)->first();
        if (!empty($check)) {
            return redirect()->back()->with(['message' => 'User already exists. Please select other user.']);
        }
        
        if (!in_array($request->payout, [Employee::PAYOUT_15_30, Employee::PAYOUT_30])) {
            return redirect()->back()->with(['message' => 'Incorrect value of payout. Please try again.']);
        }
        
        $employee = Employee::create([
            'company_id' => $user->company->id,
            'user_id' => $request->user_id,
            'rate' => $request->rate,
            'is_fixed' => !isset($request->is_fixed)? 0 : 1,
            'position' => $request->position,
            'payout' => $request->payout,
        ]);

        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while adding employee.']);
        }

        return redirect()->back()->with(['success' => 'Employee Created Successfully.']);
    }

    public function sendPayoutPage($id)
    {
        $user = $this->checkUserSession();
        $employee = Employee::where('user_id', $id)->first();
        if (empty($employee)) {
            return redirect()->back()->with(['message' => 'Cannot find employee with id: ' . $id]);
        }

        return view('pages.payout', compact('employee'));
    }

    public function sendPayout(Request $request)
    {
        $user = $this->checkUserSession();
        $totalDeduction = 0;
        if (empty($request->employeeId) || empty($request->month) || empty($request->net_pay)) {
            return $this->errorRes('Please provide required parameter.');
        }
        DB::beginTransaction();
        try {
            $payout = new EmployeePayout();
            $payout->employee_id = $request->employeeId;
            $payout->net_pay = $request->net_pay;
            $payout->total_deductions = $totalDeduction;
            $payout->created_by = $user->id;
            $payout->company_id = $user->company->id;
            $payout->save();

            if (isset($request->deductions) && !empty($request->deductions) && count($request->deductions) > 0) {
                foreach ($request->deductions as $key => $deduction) {
                    $totalDeduction += $deduction['amount'];
                    $createDeduction = EmployeeDeduction::create([
                        'payout_id' => $payout->id,
                        'name' => $deduction['name'],
                        'description' => '',
                        'amount' => $deduction['amount'],
                    ]);

                    if (!$createDeduction) {
                        throw new \Exception("An error ocurred while creating deduction", 1);
                    }
                }
                $payout->total_deductions = $totalDeduction;
                $payout->save();
            }
            DB::commit();

            $employee = User::where('id', $request->employeeId)->first();
            $employee->notify(new PayoutInvoice([]));

            return $this->successRes('Payout Created successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            throw new \Exception($ex->getMessage(), 400);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage(), 400);
        }
    }
}
