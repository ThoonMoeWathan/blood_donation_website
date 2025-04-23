<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_Inventory extends Model
{
    use HasFactory;

    protected $fillable=[
        'bank_id',
        'blood_group_id',
        'collection_date',
        'expiry_date',
        'temperature',
        'quantity',
        'status',
        'test_result'
    ];
}
