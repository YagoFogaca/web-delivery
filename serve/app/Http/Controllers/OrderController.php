<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
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
        $user = User::where('id', Auth::id())->with('address')->first()->toArray();
        return view('pages.delivery-address.index', ['adresses' => $user['address']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        // Recebo o id do endereço
        // Pegar o ID do usuario
        // Com o id do usuario trazer sua sacola com seus itens
        // Montar pedido com ???????????
        // ONDE IMPLEMENTAR O PREÇO DO FRETE? DEVOLVER COM O TOTAL DO PEDIDO
        dd($req->all());
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
