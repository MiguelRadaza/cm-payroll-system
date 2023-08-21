<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePayout;

class PayoutController extends Controller
{
    public function index()
    {
        $user = $this->checkUserSession();
        if ($user->hasRole(['ceo', 'super admin'])) {
            $payouts = EmployeePayout::where('company_id', $user->company->id)->get();
        } else {
            $payouts = EmployeePayout::where('company_id', $user->employee->company->id)
            ->where('employee_id', $user->employee->id)
            ->get();
        }

        return view('pages.payouts', compact('payouts'));
    }

    public function payslipPage($id)
    {
        $payslip = EmployeePayout::findOrFail($id);
        return view('vendor.payslip', compact('payslip'));
    }

    public function deletePayout($id)
    {   
        $user = $this->checkUserSession();
        $payout = EmployeePayout::where('id', $id)->first();
        $payout->is_deleted = 1;
        $payout->save();

        return redirect()->back()->with(['success' => 'Payout deleted successfully.']);
    }
}