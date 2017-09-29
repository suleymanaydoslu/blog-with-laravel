<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\BasePanelController as PanelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends PanelController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        return view('panel.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('panel.profile',['user' => $user]);
    }

    public function profileUpdate(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,id,'.Auth::user()->id,
            'password' => 'nullable|min:6|max:20|confirmed'
        ];

        $this->validate($request,$rules);

        $user = Auth::user();
        $user->fill($request->intersect([
            'first_name',
            'last_name',
            'email',
            'password'
        ]));

        $user->save();

        return redirect()->route('panel.profile')->with('success','Your profile updated successfully');
    }
}
