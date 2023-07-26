<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'create')->name('loja.create');
    Route::post('/loja', 'store')->name('loja.store');
});

Route::controller(EmailVerificationController::class)->group(function () {
    Route::get('/verification-email', 'verification')->name('email.verification');
    Route::post('/check-email', 'check')->name('email.check');
});
