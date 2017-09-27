<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function loginForPanel()
    {
        return view('panel.login');
    }
}
