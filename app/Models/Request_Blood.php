<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Blood extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'require_for',
        'blood_id',
        'relation',
        'message',
        'status'
    ];
}
