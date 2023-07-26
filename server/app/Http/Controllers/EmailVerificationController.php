<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    //
    public function verification()
    {
        return view('pages.verification');
    }
    public function check(Request $req)
    {
        // Pegar o id do que for pedido
        // Validar se está dentro do prazo de 15 min
        // Trocar campo de email_verificado para true
        // Apagar o registro do código
        // Redirecionar para endereço

        $req->validate(
            [
                'cod' => 'required|min:4|max:4'
            ],
            [
                'cod' => 'O código informado é invalido'
            ]
        );

        $id = Auth::id();

        dd($id);
    }
}
