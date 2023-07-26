<?php

namespace App\Http\Controllers;

use App\Mail\Verification;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Exception;
use App\Models\Store;
use App\Utils\Code\Code;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                'password' => 'required|min:8',
                'telefone' => 'required|min:10',
                'imagem' =>  'required|image'
            ],
            [
                'nome' => 'Nome invalido',
                'email' => 'Email invalido',
                'password' => 'Senha invalida',
                'telefone' => 'Telefone invalido',
                'imagem' => 'Sua imagem é invalida'
            ]
        );

        try {
            $data = $req->all();
            $data['senha'] = $data['password'];
            $data['password'] = Hash::make($data['password']);

            $extension = $req->imagem->getClientOriginalExtension();
            $data['imagem'] = $req->imagem->storeAs('logos', $data['email'] . ".{$extension}");

            $modelStore = Store::create($data);
            if (!$modelStore) {
                throw new Exception('Ocorreu um erro ao criar a loja');
            }
            $estore = $modelStore->toArray();

            $code = Code::generateCode();
            Mail::to($data['email'])->send(new Verification([
                'code' => $code,
                'nome' => $data['nome'],
            ]));

            $modelEmailVerification = EmailVerification::create(['id_referencia' => $estore['id'], 'cod' => $code]);
            if (!$modelEmailVerification) {
                throw new Exception('Ocorreu um erro ao criar a loja');
            }

            $credenciais = [
                'email' => $data['email'],
                'password' =>  $data['senha'],
            ];
            Auth::guard('store')->attempt($credenciais);

            redirect()->route('email.verification');
        } catch (Exception $error) {
            redirect()->back()->withErrors($error->getMessage());
        }
    }
}
