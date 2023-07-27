<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            dd($req->all());
        } catch (Exception $error) {
            redirect()->back()->withErrors(['error' => 'Sei la']);
        }
    }
}
