<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    CONST STATE_ACTIVE = 'active';
    CONST STATE_INACTIVE = 'inactive';

    public $fillable = [
        'name',
        'state',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employeePayout()
    {
        return $this->hasMany(EmployeePayout::class, 'company_id')->where('is_deleted', 0);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'company_id')->where('is_deleted', 0);
    }
}
