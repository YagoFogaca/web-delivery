<?php

namespace App\Http\Controllers;

use App\Models\ShoppingBag;
use App\Models\BagItem;
use App\Models\Category;
use App\Models\OpenHours;
use App\Models\Products;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{

    public function index()
    {
        return view('pages.platform-home.index');
    }

    public function home()
    {
        $store = Store::all()->toArray();
        $hours = OpenHours::all()->toArray();
        $categories = Category::with('products')->get()->toArray();
        $products = Products::with('category')->get()->toArray();
        $bagItems = [];
        if (Auth::id()) {
            $shoppingBag = ShoppingBag::where('user_id', Auth::id())->with('bagItem')->first()->toArray();
            $bagItems = BagItem::where('shopping_bag_id', $shoppingBag['id'])->with('shoppingBag')->with('product')->get()->toArray();
        }
        $day = date("N");
        $store[0]['hour'] = $hours[(int)$day - 1];
        return view('pages.menu.index', ['store' => $store[0], 'categories' => $categories, 'products' => $products, 'bagItems' => $bagItems]);
    }
}
