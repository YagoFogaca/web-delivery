<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'category';

    public $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function productCount()
    {
        return $this->products->count();
    }
}
