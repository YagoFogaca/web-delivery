<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\ShoppingBag;
use App\Models\BagItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function address()
    {
        $user = User::where('id', Auth::id())->with('shoppingBag')->with('address')->first()->toArray();
        return view('pages.delivery-address.index', ['adresses' => $user['address'], 'shoppingBag' => $user['shopping_bag']]);
    }

    public function store(Request $req)
    {
        try {
            $order = [
                "user_id" => Auth::id(),
                "code" => rand(1000, 9999),
                "shopping_bag_id" => $req->input('shopping_bag_id'),
                "address_id" => $req->input('address_id'),
                "delivery_value" => $req->input('delivery_value'),
                "total_payable" => 0
            ];
            $shoppingBag = ShoppingBag::where('user_id', Auth::id())->first()->toArray();
            $order['total_payable'] = $shoppingBag['price'] + $order['delivery_value'];
            $orderCreated = Orders::create($order);
            if (!$orderCreated) {
                throw new Exception('Ocorreu um erro interno');
            }
            $order = Orders::where('user_id', Auth::id())->first()->toArray();
            return redirect()->route('order.payment.method', ['order' => $order['id']]);
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['order', 'Ocorreu um erro interno']);
        }
    }

    public function paymentMethod(Orders $order)
    {
        return view('pages.payment-method.index', ['order' => $order]);
    }

    public function orderClosing(Orders $order, Request $req)
    {

        try {
            $paymentMethod = [
                "payment_method" => $req->input('payment-method'),
                "change_cash" => $req->input('change-cash')
            ];

            $orderUpdated = $order->update($paymentMethod);
            if (!$orderUpdated) {
                throw new Exception('Ocorreu um erro interno');
            }

            $order->address->toArray();
            $order->user->toArray();
            $order->address->toArray();
            $order->shoppingBag->bagItem->toArray();
            $orderUser =  $order->toArray();
            $productsOrder = BagItem::where('shopping_bag_id', $orderUser['shopping_bag_id'])->with('product')->get()->toArray();

            $productsOrderMsg = '';
            $addressOrderMsg = "{$orderUser['address']['street']}, {$orderUser['address']['district']} - {$orderUser['address']['number_address']}%0A%0ACompl: {$orderUser['address']['complement']} %0A%0AValor do frete: R$ {$orderUser['delivery_value']}%0A%0A";
            $orderSummary = "Subtotal: R$ {$orderUser['shopping_bag']['price']} %0A%0AValor do frete: R$ {$orderUser['delivery_value']} %0A%0ATotal: R$ {$orderUser['total_payable']} %0A%0AMetodo de pagamento: {$orderUser['payment_method']}%0A%0A";
            foreach ($productsOrder as  $productOrder) {
                $productsOrderMsg .= "{$productOrder['product']['name']} - R$ {$productOrder['price']}%0AOBS: {$productOrder['observation']}%0A%0A";
            }

            $orderMsg = "Olá, quero fazer um pedido.%0A%0APedido: %0A{$productsOrderMsg} Endereço de entrega:%0A{$addressOrderMsg} %0APagamento: %0A{$orderSummary}";
            $url = "https://wa.me/5532988396048?text=$orderMsg";

            return view('pages.confirm-order.index', ['order' => $order, 'url' => $url]);
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->withErrors(['order', 'Ocorreu um erro interno']);
        }
    }

    public function deliveryValue(String $code)
    {
        try {
            $store = Store::all()->first()->toArray();
            $cepStore = $store['cep'];
            $key = env('GOOGLE_CLOUD_KEY');
            $ch = curl_init();
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?destinations=$cepStore%20MG&origins=$code%20MG&units=metric&key=$key";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new Exception('Ocorreu um erro interno');
            }

            curl_close($ch);
            $data = json_decode($response, true);

            $priceDistance = 2.50;

            $distance = $data['rows'][0]['elements'][0]['distance']['value'];
            if ($distance <= 1000) {
                return response()->json(["delivery_value" => "0"], 200);
            }
            $deliveryValueBase = ($distance * $priceDistance) / 1000;
            $deliveryValue = floor($deliveryValueBase);
            return response()->json(["delivery_value" => $deliveryValue], 200);
        } catch (Exception $error) {
            return response()->json(["error" => $error->getMessage()], 400);
        }
    }
}
