<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePayout extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function deductions()
    {
        return $this->hasMany(EmployeeDeduction::class, 'payout_id')->where('is_deleted', 0);
    }
}
