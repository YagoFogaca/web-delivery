<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OpenHours;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function login()
    {
        return view('pages.login-store.index');
    }

    public function index()
    {
        return view('pages.platform-home.index');
    }

    public function home()
    {
        return view('pages.menu.index');
    }

    public function products()
    {
        $categories = Category::with('products')->get();
        $products = Products::with('category')->get()->toArray();
        return view('pages.platform-products.index', ['categories' => $categories, 'products' => $products]);
    }

    public function store()
    {
        $categories = Category::with('products')->get();
        return view('pages.create-products.index', ['categories' => $categories]);
    }

    public function edit(Products $product)
    {
        $categories = Category::with('products')->get();
        return view('pages.edit-products.index', ['product' => $product->toArray(), 'categories' => $categories]);
    }

    public function editContact(Store $store)
    {
        return view('pages.edit-contact.index', ['store' => $store]);
    }

    public function security()
    {
        return view('pages.store-security.index');
    }

    public function address(Store $store)
    {
        return view('pages.store-address.index', ['store' => $store]);
    }

    public function indexOpenHours()
    {
        $openHours = OpenHours::all()->toArray();
        return view('pages.open-hours.index', ['open_hours' => $openHours]);
    }
}
