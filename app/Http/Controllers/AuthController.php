<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function loginForPanel()
    {
        return view('panel.login');
    }
}
