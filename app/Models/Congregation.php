<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'phone_number',
    ];
}
