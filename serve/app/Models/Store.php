<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{
    use HasFactory;

    public $fillable = [
        'email',
        'password',
        'telephone',
        'cep',
        'number_address',
        'shop_open'
    ];
}
