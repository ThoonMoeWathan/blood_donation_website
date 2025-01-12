<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund_Donation extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'payment_type',
        'amount'
    ];
}
