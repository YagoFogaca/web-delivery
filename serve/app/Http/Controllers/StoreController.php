<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function auth(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ],
            [
                'email' => 'Email invalido',
                'password' => 'Senha invalida'
            ]
        );
        try {
            $credentials = [
                'email' =>  $req->input('email'),
                'password' => $req->input('password'),
            ];
            $store_auth = Auth::guard('store')->attempt($credentials);
            if (!$store_auth) {
                throw new Exception('Email ou senha invalidos');
            }
            return redirect()->route('platform.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['auth' => $error->getMessage()]);
        }
    }
}
