<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegistrationInvitation;
use App\Models\{
    Employee,
    EmployeePayout,
    RegistrationKey,
    EmployeeDeduction,
    User
};
use App\Notifications\PayoutInvoice; 

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
            'position' => ['required', 'string',],
            'rate' => ['required', 'string',],
        ])->validate();
        
        $employeeEmail = '';
        $payload = [];

        // Check if exists
        $check = Employee::where('user_id', $request->user_id)->where('position', $request->position)->first();
        if (!empty($check)) {
            return redirect()->back()->with(['message' => 'User already exists. Please select other user.']);
        }
        
        if (!in_array($request->payout, [Employee::PAYOUT_15_30, Employee::PAYOUT_30])) {
            return redirect()->back()->with(['message' => 'Incorrect value of payout. Please try again.']);
        }

        $payload = [
            'company_id' => $user->company->id,
            'rate' => $request->rate,
            'is_fixed' => !isset($request->is_fixed)? 0 : 1,
            'position' => $request->position,
            'payout' => $request->payout,
        ];

        if (isset($request->user_id)) {
            $payload['user_id'] = $request->user_id;
        } else if (isset($request->user_email)) {
            $employeeEmail = $request->user_email;
        } else {
            return redirect()->back()->with(['message' => 'Please provide required parameter.']);
        }
        
        $employee = Employee::create($payload);

        if (!empty($employeeEmail)) {
            $hashKey = Str::random(40); 
            $expiration = Carbon::now()->addDay();
            $registrationKeyDetails = RegistrationKey::create([
                'hash_key' => $hashKey,
                'user_id' => $user->id,
                'expiration' => $expiration,
                'email' => $employeeEmail,
                'role' => 'employee'
            ]);
            $employee->registration_key_id = $registrationKeyDetails->id;
            $employee->save();
            Notification::route('mail', $user->email)
                ->notify(new RegistrationInvitation($hashKey, $employeeEmail, $expiration, route('register')));
        }

        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while adding employee.']);
        }

        return redirect()->back()->with(['success' => 'Employee Created Successfully.']);
    }

    public function sendPayoutPage($id)
    {
        $user = $this->checkUserSession();
        $employee = Employee::where('user_id', $id)->where('company_id', $user->company->id)->first();
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
            Session::flash('message', 'Please provide required parameter.'); 
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
            $employee->notify(new PayoutInvoice($user->name));
            Session::flash('success', 'Payout created successfully.'); 
            return $this->successRes('Payout Created successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            Session::flash('message', $ex->getMessage()); 
            throw new \Exception($ex->getMessage(), 400);
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('message', $th->getMessage());
            throw new \Exception($th->getMessage(), 400);
        }
    }

    public function updateEmployee(Request $request)
    {
        $user = $this->checkUserSession();
        $employee = Validator::make($request->all(), [
            'position' => ['required', 'string',],
            'rate' => ['required', 'string',],
            'id' => ['required']
        ])->validate();

        
        if (!in_array($request->payout, [Employee::PAYOUT_15_30, Employee::PAYOUT_30])) {
            return redirect()->back()->with(['message' => 'Incorrect value of payout. Please try again.']);
        }
        
        $employee = Employee::where('id', $request->id)->first();
        $employee->rate = $request->rate;
        $employee->is_fixed = !isset($request->is_fixed)? 0 : 1;
        $employee->position = $request->position;
        $employee->payout = $request->payout;
        $employee->save();

        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while adding employee.']);
        }

        return redirect()->back()->with(['success' => 'Employee Created Successfully.']);

    }

    public function deleteEmployee($id)
    {
        $employee = Employee::where('id', $id)->where('is_deleted', 0)->first();
        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while removing employee.']);
        }
        $employee->is_deleted = 1;
        $employee->save();

        return redirect()->back()->with(['warning' => 'Employee Deleted Successfully.']);
    }

    public function activateEmployee($id)
    {
        $employee = Employee::where('id', $id)->where('is_deleted', 1)->first();
        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while activating employee.']);
        }
        $employee->is_deleted = 0;
        $employee->save();

        return redirect()->back()->with(['message' => 'Employee Activated Successfully.']);
    }
}
