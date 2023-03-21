<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            return redirect()->route('home');
        } else {
            return redirect()->back()
                ->withErrors('Email-Address And Password Are Wrong.');
        }
    }

    public function doLogout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
