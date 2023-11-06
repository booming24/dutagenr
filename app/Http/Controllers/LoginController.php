<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Penerima;
use App\Models\Sumber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard'); 
        }
        return redirect('/login');
    }

    public function login()
    {
        $login   = User::all();
        return view('auth.login', compact('login'));
    }
}
