<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseWebController as WebController;
use Illuminate\Http\Request;

class HomeController extends WebController
{

    public function home(Request $request)
    {
        return view('web.welcome');
    }
}
