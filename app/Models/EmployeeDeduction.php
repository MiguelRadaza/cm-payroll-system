<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    use HasFactory;

    public $fillable = [
        'payout_id',
        'name',
        'description',
        'amount',
    ];
}
