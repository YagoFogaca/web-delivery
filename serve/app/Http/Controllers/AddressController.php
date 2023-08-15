<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create(Request $req)
    {
        $req->validate(
            [
                'cep' => 'required|min:8|max:8',
                'state' => 'required',
                'city' => 'required',
                'street' => 'required',
                'number_address' => 'required',
                'complement' => 'nullable',
                'district' => 'required'
            ],
            [
                'cep' => 'CEP inválido',
                'state' => 'Estado inválido',
                'city' => 'Cidade inválido',
                'street' => 'Rua inválido',
                'number_address' => 'Número inválido',
                'district' => 'Bairro inválido'
            ]
        );
        try {
            $address = [
                "user_id" => Auth::id(),
                "cep" => $req->input('cep'),
                "state" => $req->input('state'),
                "city" => $req->input('city'),
                "district" => $req->input('district'),
                "street" => $req->input('street'),
                "number_address" => $req->input('number_address'),
                "complement" => $req->input('complement')
            ];

            $addressCreated = Address::create($address);
            if (!$addressCreated) {
                throw new Exception('Ocorreu um erro ao adicionar o endereço do usuário');
            }
            return redirect()->route('menu.home');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }
}
