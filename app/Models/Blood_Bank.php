<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_Bank extends Model
{
    use HasFactory;
    protected $fillable=[
        'bank_name',
        'state',
        'city',
        'address',
        'open_at',
        'close_at'
    ];
}
