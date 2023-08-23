<?php

namespace App\Http\Controllers;

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
        $user = User::find(Auth::id())->with('address')->first()->toArray();
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
