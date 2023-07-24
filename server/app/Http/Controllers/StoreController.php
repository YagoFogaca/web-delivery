<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $req)
    {
        $req->validate(
            [
                'nome' => 'required|min:4',
                'email' => 'required|email',
                'senha' => 'required|min:8',
                'telefone' => 'required|min:10',
                'imagem' =>  'required|image'
            ],
            [
                'nome' => 'Nome invalido',
                'email' => 'Email invalido',
                'senha' => 'Senha invalida',
                'telefone' => 'Telefone invalido',
                'imagem' => 'Sua imagem é invalida'
            ]
        );

        $data = $req->all();
        $data['senha'] = bcrypt($req->senha);
        $extension = $req->imagem->getClientOriginalExtension();
        $data['imagem'] = $req->imagem->storeAs('logos', $data['email'] . ".{$extension}");


        // Crio a loja (PRIMEIRO TESTAR O SALVAMENTO DA IMAGEM)
        // Salvo o endereço
        // Salvo a imagem na aplicação OK 
        // Mando o email
        // Salvo o código em email_verificado

        // Direcionar para validar o email
    }
}
