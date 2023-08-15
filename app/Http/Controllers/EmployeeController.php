<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
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
        dd($request->payout);
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
        if ($request->payout === Employee::PAYOUT_15_30) {
            dd($employee);
        }

        if (!$employee) {
            return redirect()->back()->with(['message' => 'An error ocurred while adding employee.']);
        }

        return redirect()->back()->with(['success' => 'Employee Created Successfully.']);
    }
}
