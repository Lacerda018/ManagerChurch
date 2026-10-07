<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missionary extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'age',
        'address',
        'phone_number',
        'gender',
        'civil_status',
        'congregation',
    ];
}
