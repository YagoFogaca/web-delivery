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

        $data = User::find(Auth::id());
        $user = $data->toArray();
        $sacola = $data->shoppingBag->toArray();
        $itens = $data->shoppingBag->bagItem->toArray();

        dd(
            'User:',
            $user,
            "Sacola:",
            $sacola,
            'Itens:',
            $itens
        );
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

    public function removeItems(Request $req)
    {
        dd($req->all());
        // Verificar se o usuario já tem uma sacola criada
        // Fazer a diminuição do preço da sacola
        // Deletar o Bag_itens
        // Atualizar o preço da sacola
        // retornar
    }

    public function resetItems(Request $req)
    {
        dd($req->all());
        // Verificar se o usuario já tem uma sacola criada
        // Fazer diminuição do preço da sacola
        // Deletar todos os Bag_itens
        // Atualizar o preço da sacola
        // retornar
    }

    public function updateItems(Request $req, BagItem $bag_item)
    {
        dd($req->all());
        // Verificar se o usuario já tem uma sacola criada
        // Fazer diminuição do preço da sacola
        // Deletar todos os Bag_itens
        // Atualizar o preço da sacola
        // retornar
    }
}
