<?php

namespace App\Http\Controllers;

use App\Models\BagItem;
use App\Models\ShoppingBag as ModelShoppingBag;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingBag extends Controller
{

    public function index()
    {
        $shoppingBag = ModelShoppingBag::where('user_id', Auth::id())->with('bagItem')->first()->toArray();
        $items = BagItem::where('shopping_bag_id', $shoppingBag['id'])->with('shoppingBag')->with('product')->get()->toArray();
        return view('pages.shopping-bag.index', ['items' => $items, 'shoppingBag' => $shoppingBag]);
    }

    public function store(Request $req)
    {

        try {
            $user_id = Auth::id();
            $user = User::find($user_id);

            $item = [
                "user_id" => $user_id,
                'shopping_bag_id' => $user->shoppingBag->toArray()['id'],
                "observation" => $req->input('observation'),
                "amount" => $req->input('amount'),
                "product_id" => $req->input('product_id'),
                "price" => $req->input('price'),
            ];
            $bagItemCreated =  BagItem::create($item);
            if (!$bagItemCreated) {
                throw new Exception('Ocorreu um erro ao adiconar o item na sacola');
            }
            $newPrice = $user->shoppingBag->toArray()['price'] + $item['price'];
            ModelShoppingBag::where("user_id", $user_id)->update(['price' => $newPrice]);

            return redirect()->route('menu.home');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao adiconar o item na sacola']);
        }
    }

    public function destroy(BagItem $bagItem)
    {
        try {
            $shoppingBag = $bagItem->shoppingBag->toArray();
            $newPriceShoppingBag = $shoppingBag['price'] - $bagItem->toArray()['price'];
            $bagItemDeleted = $bagItem->delete();
            if (!$bagItemDeleted) {
                throw new Exception("Ocorreu um erro ao deletar o item do pedido");
            }
            ModelShoppingBag::where("user_id", Auth::id())->update(['price' => $newPriceShoppingBag]);
            return redirect()->route('item.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['Error' => 'Ocorreu um erro ao deletar o item do pedido']);
        }
    }

    public function update(BagItem $bagItem, Request $req)
    {
        try {
            $newBagItem = $req->all();
            $shoppingBag = $bagItem->shoppingBag->toArray();
            if ($newBagItem['price'] !== $bagItem->toArray()['price']) {
                if ($newBagItem['price'] > $bagItem['price']) {
                    $priceDifference = $newBagItem['price'] - $bagItem['price'];
                    $shoppingBag['price'] += $priceDifference;
                    ModelShoppingBag::where("user_id", Auth::id())->update(['price' => $shoppingBag['price']]);
                } else if ($newBagItem['price'] < $bagItem['price']) {
                    $priceDifference = $bagItem['price'] - $newBagItem['price'];
                    $shoppingBag['price'] -= $priceDifference;
                    ModelShoppingBag::where("user_id", Auth::id())->update(['price' => $shoppingBag['price']]);
                }
            }
            $bagItemUpdated = $bagItem->update($req->all());
            if (!$bagItemUpdated) {
                throw new Exception("Ocorreu um erro ao atualizar o item do pedido");
            }
            return redirect()->route('item.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['Error' => 'Ocorreu um erro ao atualizar o item do pedido']);
        }
    }
}
