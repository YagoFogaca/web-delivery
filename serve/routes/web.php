<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ShoppingBag;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Controller e Routes da loja
|--------------------------------------------------------------------------
*/

Route::controller(StoreController::class)->group(function () {
    // Página de login e action de autenticação
    Route::get('/store-auth', 'login')->name('store.login');
    Route::post('/store-auth', 'auth')->name('store.auth');

    // Página de atualização e action de contato
    Route::get('/store-contact/{store}/edit', 'contact')->middleware('auth.store:store')->name('store.contact.edit');
    Route::patch('/patch/{store}', 'updateContact')->middleware('auth.store:store')->name('store.contact.update');

    // Página de atualização e action de senha
    Route::get('/store-security', 'security')->middleware('auth.store:store')->name('store.security.edit');
    Route::patch('/security/{store}', 'securityUpdate')->middleware('auth.store:store')->name('store.security.update');

    // Página de atualização e action de endereço
    Route::get('/store-address/{store}/edit', 'address')->middleware('auth.store:store')->name('store.address.edit');
    Route::put('/address/{store}', 'addressUpdate')->middleware('auth.store:store')->name('store.address.update');

    // Página de atualização e action do horario de funcionamento
    Route::get('/store-open-hours/edit', 'openHours')->middleware('auth.store:store')->name('store.open-hours.edit');
    Route::put('/open-hours', 'openHoursUpdate')->middleware('auth.store:store')->name('store.open-hours.update');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes de produtos
|--------------------------------------------------------------------------
*/

Route::controller(ProductsController::class)->group(function () {
    // Página de criar e action de produtos
    Route::get('/create-products', 'store')->middleware('auth.store:store')->name('products.create');
    Route::post('/product', 'create')->middleware('auth.store:store')->name('products.store');

    // Página de ver todos os produtos { loja } 
    Route::get('/products', 'index')->middleware('auth.store:store')->name('products.index');

    // Página de editar e action de produtos
    Route::get('/products/{product}/edit/', 'edit')->middleware('auth.store:store')->name('products.edit');
    Route::patch('/product/{product}', 'update')->middleware('auth.store:store')->name('products.update');

    // Action de deletar produtos
    Route::delete('/delete/{id}', 'delete')->middleware('auth.store:store')->name('products.delete');

    // Action de ativar e desativar produtos
    Route::patch('/product/active/{product}', 'active')->middleware('auth.store:store')->name('products.active');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes de usuários
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->group(function () {
    // Página de criar e action de usuário
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/user', 'store')->name('user.store');

    // Página de login e action de autenticação 
    Route::get('/login', 'login')->name('user.login');
    Route::post('/login', 'auth')->name('user.auth');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes de endereço do usuário
|--------------------------------------------------------------------------
*/

Route::controller(AddressController::class)->group(function () {
    Route::get('/user/address', 'create')->name('user.address.create');
    Route::post('/address', 'store')->name('user.address.store');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes de sacola e itens do pedido do usuário
|--------------------------------------------------------------------------
*/

Route::controller(ShoppingBag::class)->group(function () {
    // Ver os itens da sacola
    Route::get('/item-bag', 'index')->middleware('auth')->name('item.index');

    // Criar e adicionar um item na sacola
    Route::post('/item-bag', 'store')->middleware('auth')->name('item.bag.store');

    // Atualizar um item na da sacola
    Route::patch('/bag-item/{bagItem}', 'update')->middleware('auth')->name('item.update');

    // Remover um item da sacola
    Route::delete('/delete-bag-item/{bagItem}', 'destroy')->middleware('auth')->name('item.destroy');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes de pedido do usuário
|--------------------------------------------------------------------------
*/

Route::controller(OrderController::class)->group(function () {
    // Página de adiconar endereço do usuário ao pedido
    Route::get('/delivery-address', 'address')->middleware('auth')->name('address.order');

    // Criar pedido
    Route::post('/delivery-address', 'store')->middleware('auth')->name('order.store');

    // Consultar preço do frete do pedido
    Route::get('/delivery-value/{code}', 'deliveryValue')->middleware('auth')->name('order.delivery.value');

    // Página e action de adicionar o método de pagamento
    Route::get('/confirm-order/{order}', 'confirmOrder')->middleware('auth')->name('order.confirm.order');
    Route::patch('/order-closing/{order}', 'orderClosing')->middleware('auth')->name('order.order.closing');
});

/*
|--------------------------------------------------------------------------
| Controller e Routes do catalogo de produtos da loja
|--------------------------------------------------------------------------
*/

Route::controller(PlatformController::class)->group(function () {
    Route::get('/', 'home')->name('menu.home');
    Route::get('/platform-store', 'index')->middleware('auth.store:store')->name('platform.index');
});
