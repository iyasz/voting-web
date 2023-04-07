<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if(Auth::user()->role_id == 1){
                return redirect('/app');
            }else{
                return redirect('/home');
            }
        }

        return back()->withErrors([
            'username' => 'Username Atau Password anda salah'
        ])->onlyInput('username');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/auth/login');
    }


}
