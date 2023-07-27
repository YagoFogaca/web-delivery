<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AddressController extends Controller
{

    public function index()
    {
        return view('pages.address.index');
    }

    public function storeAddress(Request $req)
    {
        try {
            $req->validate(
                [
                    'cep' => 'required|min:8|max:8',
                    'estado' => 'required|min:2',
                    'cidade' => 'required',
                    'rua' => 'required',
                    'numero' => 'required'
                ],
                [
                    'cep' => 'CEP invalido',
                    'estado' => 'Estado invalido',
                    'cidade' => 'Cidade invalido',
                    'rua' => 'Rua invalido',
                    'numero' => 'Número invalido'
                ]
            );
            $address = $req->all();
            $address['stores_id'] = Auth::guard('store')->id();
            $modelAddress = Address::create($address);
            if (!$modelAddress) {
                throw new Exception('Ocorreu um erro ao adicionar o endereço');
            }

            redirect()->route('app');
        } catch (Exception $error) {
            redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }
}
