<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'endereco_store';

    public $fillable = [
        'id',
        'stores_id',
        'cep',
        'estado',
        'cidade',
        'rua',
        'numero',
        'complemento',
    ];
}
