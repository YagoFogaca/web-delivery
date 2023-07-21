<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'telefone',
        'imagem',
        'email_verificado'
    ];

    // public function products()
    // {
    //     return $this->hasMany(Products::class);
    // }
}
