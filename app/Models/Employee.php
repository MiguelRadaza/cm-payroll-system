<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    CONST PAYOUT_15_30 = "15-30";
    CONST PAYOUT_30 = "30";

    public $fillable = [
        'company_id',
        'user_id',
        'rate',
        'is_fixed',
        'position',
        'payout',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
