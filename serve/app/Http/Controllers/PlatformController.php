<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
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

    public function products()
    {
        $categories = Category::with('products')->get();
        $products = Products::with('category')->get()->toArray();
        return view('pages.platform-products.index', ['categories' => $categories, 'products' => $products]);
    }
}
