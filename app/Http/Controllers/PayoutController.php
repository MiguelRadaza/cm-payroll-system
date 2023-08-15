<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePayout;

class PayoutController extends Controller
{
    public function index()
    {
        $user = $this->checkUserSession();
        $payouts = EmployeePayout::where('company_id', $user->company->id)->get();

        return view('pages.payouts', compact('payouts'));
    }
}