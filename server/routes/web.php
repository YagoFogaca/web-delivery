<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'create')->name('loja.create');
    Route::post('/loja', 'store')->name('loja.store');
});
