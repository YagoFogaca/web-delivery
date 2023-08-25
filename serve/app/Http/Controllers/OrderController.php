<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function deliveryAddress()
    {
        $user = User::where('id', Auth::id())->with('shoppingBag')->with('address')->first()->toArray();
        return view('pages.delivery-address.index', ['adresses' => $user['address'], 'shoppingBag' => $user['shopping_bag']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        try {
            $order = [
                "user_id" => Auth::id(),
                "code" => rand(1000, 9999),
                "shopping_bag_id" => $req->input('shopping_bag_id'),
                "address_id" => $req->input('address_id'),
                "delivery_value" => $req->input('delivery_value')
            ];
            $orderCreated = Orders::create($order);
            if (!$orderCreated) {
                throw new Exception('Ocorreu um erro interno');
            }
            dd('Será que criou');
            return redirect()->route('order.payment.method');
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->withErrors(['order', 'Ocorreu um erro interno']);
        }
    }

    public function deliveryValue(String $code)
    {
        // dd($code);
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
