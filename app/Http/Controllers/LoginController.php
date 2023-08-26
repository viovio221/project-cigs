<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:web', ['except' => 'logout']);
    }

    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role=='admin') {
            return to_route('dashboard.index');
        } else if (Auth::user()->role=='member') {
            return to_route('dashboard.index');
        }
    }
        return back()->withErrors([
            'email' => 'Kredentials yang diinputkan tidak cocok',
        ]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login.index'); // Ubah to_route menjadi redirect()->route
    }

}
