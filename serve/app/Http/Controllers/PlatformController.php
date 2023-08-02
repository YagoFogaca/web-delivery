<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // $categories = Category::all()->toArray();
        $categories = Category::with('products')->get();
        // dd($categories);
        return view('pages.platform-products.index', ['categories' => $categories]);
    }
}
