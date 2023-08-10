<?php

use App\Http\Controllers\OpenHours;
use App\Http\Controllers\ProductsController;
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
    Route::patch('/patch/{store}', 'contact')->name('store.contact.update');
    Route::patch('/security/{store}', 'security')->name('store.security.update');
    Route::put('/address/{store}', 'address')->name('store.address.update');
});

Route::controller(ProductsController::class)->group(function () {
    Route::post('/create', 'create')->name('products.store');
    Route::delete('/delete/{id}', 'delete')->name('products.delete');
    Route::patch('/patch/{product}', 'update')->name('products.update');
});

Route::controller(OpenHours::class)->group(function () {
    Route::put('/open-hours', 'update')->name('hours.update');
});

Route::controller(PlatformController::class)->group(function () {
    Route::get('/store-auth', 'login')->name('store.login');
    Route::get('/platform-store', 'index')->name('platform.index');
    Route::get('/platform-products', 'products')->name('platform.products');
    Route::get('/create-products', 'store')->name('platform.create.products');
    Route::get('/products/{product}/edit/', 'edit')->name('platform.edit.products');
    Route::get('/store-contact/{store}/edit', 'editContact')->name('platform.edit.contact');
    Route::get('/store-security', 'security')->name('platform.security.store');
    Route::get('/store-address/{store}/edit', 'address')->name('platform.address.store');
    Route::get('/store-open-hours/edit', 'indexOpenHours')->name('platform.open-hours.store');
});
