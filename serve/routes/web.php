<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StoreController::class)->group(function () {
    Route::post('/store-auth', 'auth')->name('store.auth');
});

Route::controller(PlatformController::class)->group(function () {
    Route::get('/store-auth', 'login')->name('store.login');

    // Plataforma Loja
    Route::get('/platform-store', 'index')->name('platform.index');
});
