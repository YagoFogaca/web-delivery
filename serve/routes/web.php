<?php

use App\Http\Controllers\OpenHours;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ShoppingBag;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)->group(function () {
    Route::post('/store-auth', 'auth')->name('store.auth');
    Route::patch('/patch/{store}', 'contact')->middleware('auth.store:store')->name('store.contact.update');
    Route::patch('/security/{store}', 'security')->middleware('auth.store:store')->name('store.security.update');
    Route::put('/address/{store}', 'address')->middleware('auth.store:store')->name('store.address.update');
});

Route::controller(ProductsController::class)->group(function () {
    Route::post('/product', 'create')->middleware('auth.store:store')->name('products.store');
    Route::delete('/delete/{id}', 'delete')->middleware('auth.store:store')->name('products.delete');
    Route::patch('/patch-product/{product}', 'update')->middleware('auth.store:store')->name('products.update');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/user', 'store')->name('user.store');
    Route::post('/login', 'auth')->name('user.auth');
});

Route::controller(AddressController::class)->group(function () {
    Route::post('/address', 'create')->name('user.create.address');
});

Route::controller(OpenHours::class)->group(function () {
    Route::put('/open-hours', 'update')->middleware('auth.store:store')->name('hours.update');
});

Route::controller(ShoppingBag::class)->group(function () {
    Route::post('/item-bag', 'store')->middleware('auth')->name('item.bag.store');
    Route::get('/item-bag', 'index')->middleware('auth')->name('item.index');
    Route::patch('/bag-item/{bagItem}', 'update')->middleware('auth')->name('item.update');
    Route::delete('/delete-bag-item/{bagItem}', 'destroy')->middleware('auth')->name('item.destroy');
});


Route::controller(OrderController::class)->group(function () {
    Route::get('/delivery-address', 'deliveryAddress')->middleware('auth')->name('address.order');
    Route::post('/delivery-address', 'create')->middleware('auth')->name('order.store');
    Route::get('/delivery-value/{code}', 'deliveryValue')->middleware('auth')->name('order.delivery.value');
    Route::get('/payment-method/{order}', 'indexPaymentMethod')->middleware('auth')->name('order.payment.method');
    Route::patch('/payment-method/{order}', 'paymentMethod')->middleware('auth')->name('order.payment.method.update');
});

Route::controller(PlatformController::class)->group(function () {
    Route::get('/', 'home')->name('menu.home');
    Route::get('/login', 'userLogin')->name('login');
    Route::get('/user/create', 'create')->name('user.create');
    Route::get('/user/address', 'userAddress')->name('user.address');
    Route::get('/store-auth', 'login')->name('store.login');
    Route::get('/platform-store', 'index')->middleware('auth.store:store')->name('platform.index');
    Route::get('/platform-products', 'products')->middleware('auth.store:store')->name('platform.products');
    Route::get('/create-products', 'store')->middleware('auth.store:store')->name('platform.create.products');
    Route::get('/products/{product}/edit/', 'edit')->middleware('auth.store:store')->name('platform.edit.products');
    Route::get('/store-contact/{store}/edit', 'editContact')->middleware('auth.store:store')->name('platform.edit.contact');
    Route::get('/store-security', 'security')->middleware('auth.store:store')->name('platform.security.store');
    Route::get('/store-address/{store}/edit', 'address')->middleware('auth.store:store')->name('platform.address.store');
    Route::get('/store-open-hours/edit', 'indexOpenHours')->middleware('auth.store:store')->name('platform.open-hours.store');
});
