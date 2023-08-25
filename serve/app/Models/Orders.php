<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $fillable = [
        'code',
        'delivery_value',
        'payment_method',
        'change_cash',
        'total_payable',
        'user_id',
        'shopping_bag_id',
        'address_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    public function shoppingBag(): BelongsTo
    {
        return $this->belongsTo(ShoppingBag::class);
    }
}
