<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'state',
        'city',
        'district',
        'street',
        'number_address',
        'user_id',
        'complement'
    ];
    protected $table = 'address';
}
