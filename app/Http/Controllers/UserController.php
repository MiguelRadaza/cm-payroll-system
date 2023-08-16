<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class UserController extends Controller
{
    public function getUserProfile()
    {
        $user = $this->checkUserSession();
        $employeeCount = Employee::where('company_id', $user->company->id)->count();

        return view('pages.profile', compact('employeeCount'));
    }
}
