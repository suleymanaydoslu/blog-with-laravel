<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function var_dump;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginForPanel()
    {
        return view('panel.login');
    }


    public function loginForPanelPost(Request $request)
    {
        /** Validating request */
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ];

        $this->validate($request,$rules);

        $attempt = Auth::attempt($request->intersect(['email','password']));

        if ($attempt) {
            return redirect()->route('panel.dashboard');
        }

        return redirect()->back()->withErrors('Invalid account info');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutForPanel()
    {
        Auth::logout();
        return redirect()->route('panel.login');
    }
}
