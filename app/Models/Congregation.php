<?php

namespace App\Models;

use App\Traits\Auditavel;
use App\Traits\FormataTelefone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Congregations extends Model
{
    use SoftDeletes;
}
class Congregation extends Model
{
    //
    use HasFactory, SoftDeletes, FormataTelefone, Auditavel;
    protected $fillable = [
        'name',
        'address',
        'phone_number',
    ];
}
