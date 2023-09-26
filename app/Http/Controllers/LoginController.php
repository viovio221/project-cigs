<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['logout', 'show']]);
    }

    public function index()
    {
        $profile = Profile::all();
        return view('login.index', compact('profile'));
    }


    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['email' => 'The username and password entered do not match'])->withInput();
        }
    }


    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login.index');
    }

}
