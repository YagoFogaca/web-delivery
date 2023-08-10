<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenHours extends Model
{
    use HasFactory;

    public $fillable = [
        'day',
        'start_time',
        'end_time',
        'active',
    ];
}
