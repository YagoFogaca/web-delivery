<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ShoppingBag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:user',
                'telephone' => 'required|min:10|max:11',
                'password' => 'required|min:6'
            ],
            [
                'name' => 'Nome inválido',
                'email' => 'Email inválido',
                'telephone' => 'Telefone inválido',
                'password' => 'Sua senha deve ser maior que 6 caracteres'
            ]
        );

        try {
            $userData = [
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'telephone' => $req->input('telephone'),
                'password' => Hash::make($req->input('password'))
            ];

            $userCreated = User::create($userData);
            if (!$userCreated) {
                throw new Exception('Ocorreu um erro ao criar o usuário');
            }

            Auth::attempt(['email' => $req->input('email'), 'password' => $req->input('password')]);
            ShoppingBag::create(['user_id' => Auth::id(), 'price' => 0.00]);

            return redirect()->route('user.address')->with('auth', 'Conta criado com sucesso faça Login');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function auth(Request $req)
    {
        $req->validate(
            [
                'email' => 'required',
                'password' => 'required|min:6'
            ],
            [
                'email' => 'Email inválido',
                'password' => 'Sua senha deve ser maior que 6 caracteres'
            ]
        );

        try {
            $user = [
                'email' => $req->input('email'),
                'password' => $req->input('password')
            ];

            if (!Auth::attempt($user)) {
                return redirect()->back()->withErrors(['error' => 'Email ou senha inválidos']);
            };
            return redirect()->route('menu.home');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }
}
