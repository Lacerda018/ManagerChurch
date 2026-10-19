<?php

namespace App\Models;

//se Illuminate\Database\Eloquent\Attributes\UseFactory;

use App\Traits\Auditavel;
use App\Traits\FormataTelefone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;



class Missionaries extends Model
{
    use SoftDeletes;
}
class Missionary extends Model
{
    //
    use HasFactory, FormataTelefone, Auditavel;
    protected $fillable = [
        'name',
        'email',
        'age',
        'address',
        'phone_number',
        'gender',
        'civil_status',
        'congregation_id',
        'password',
    ];

    public function congregation(): BelongsTo
    {
        return $this->belongsTo(Congregation::class);
    }
}

