<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ShoppingBag extends Model
{
    use HasFactory;

    protected $table = 'shopping_bag';

    public $fillable = [
        'price',
        'user_id'
    ];

    public function bagItem(): HasMany
    {
        return $this->hasMany(BagItem::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
