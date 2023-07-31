<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
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
