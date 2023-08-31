<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\OpenHours;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function login()
    {
        return view('pages.login-store.index');
    }

    public function contact(Store $store)
    {
        return view('pages.edit-contact.index', ['store' => $store]);
    }

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

    public function updateContact(Store $store, Request $req)
    {
        $req->validate(
            [
                'email' => 'nullable|email',
                'telephone' => 'nullable|min:11'
            ]
        );
        try {
            $contact = $req->all();
            $storeContact = $store->update($contact);
            if (!$storeContact) {
                throw new Exception('Contato não foi atualizado');
            }
            return redirect()->back()->with('contact', 'Informações de contato atualizadas com sucesso');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function security()
    {
        return view('pages.store-security.index');
    }

    public function securityUpdate(Store $store, Request $req)
    {
        $req->validate(
            [
                'password' => 'required|min:8|confirmed',
            ],
            [
                'password' => ['confirmed' => 'As senha não são iguais']
            ]
        );
        try {
            $password = ['password' => Hash::make($req->input('password'))];
            $passwordUpdated = $store->update($password);
            if (!$passwordUpdated) {
                throw new Exception('Senha não foi atualizada');
            }
            return redirect()->back()->with('password', 'Senha atualizada com sucesso');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function address(Store $store)
    {
        return view('pages.store-address.index', ['store' => $store]);
    }

    public function addressUpdate(Store $store, Request $req)
    {
        $req->validate([
            'cep' => 'required|min:8|max:8',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
            'number_address' => 'required|numeric',
            'complement' => 'nullable',
        ]);

        try {
            $address = $req->all();
            $addressUpdated = $store->update($address);
            if (!$addressUpdated) {
                throw new Exception('Endereço atualizado com sucesso');
            }

            return redirect()->back()->with('address', 'Endereço atualizado com sucesso');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function openHours()
    {
        $openHours = OpenHours::all(['*'])->toArray();
        return view('pages.open-hours.index', ['open_hours' => $openHours]);
    }

    public function openHoursUpdate(Request $req)
    {
        $hours = $req->all();
        try {
            foreach ($hours['data'] as $hour) {
                $openHourModel = OpenHours::where('day', $hour['day'])->update($hour);
                if (!$openHourModel) {
                    throw new Exception("O dia {$hour['day']} não foi possivel ser atualizado");
                }
            }
            return response()->json(["mensage" => "Horarios atualizados com suceso"], 200);
        } catch (Exception $error) {
            return response()->json(['mensage' => $error->getMessage()], 400);
        }
    }
}
