<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BagItem extends Model
{
    use HasFactory;

    protected $table = 'bag_item';

    public $fillable = [
        'shopping_bag_id',
        'product_id',
        'amount',
        'observation',
        'price'
    ];

    public function shoppingBag(): BelongsTo
    {
        return $this->belongsTo(ShoppingBag::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }
}
