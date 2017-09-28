<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\BasePanelController as PanelController;

class HomeController extends PanelController
{
    public function dashboard()
    {
        return view('panel.dashboard');
    }
}
