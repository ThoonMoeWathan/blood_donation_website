<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_Donor extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'blood_id',
        'weight',
        'allergy',
        'disease',
        'last_donated_date'
    ];
}
