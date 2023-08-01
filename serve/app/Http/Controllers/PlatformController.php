<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function login()
    {
        return view('pages.login-store.index');
    }

    public function index()
    {
        return view('pages.platform-home.index');
    }
}
