<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\AddressController;

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'create')->name('loja.create');
    Route::post('/loja', 'store')->name('loja.store');
});

Route::controller(EmailVerificationController::class)->group(function () {
    Route::get('/verification-email', 'verification')->name('email.verification');
    Route::post('/check-email', 'check')->name('email.check');
});

Route::controller(AddressController::class)->group(function () {
    Route::get('/address/create', 'index')->name('address.index');
    Route::post('/address', 'storeAddress')->name('address.store');
});
