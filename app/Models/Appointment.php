<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'bank_id',
        'doctor_id',
        'phone',
        'date',
        'time',
        'status'
    ];
}
