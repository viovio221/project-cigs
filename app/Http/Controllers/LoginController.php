<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['except'=>'logout']);
    }

    function index()
    {
        return view("login/index");
    }

    function login(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required' => 'Tolong Masukkan Email',
            'password.required' => 'Tolong Masukkan Password',
        ]);

        $infologin =[
            'email'=> $request->email,
            'password'=> $request->password,
        ];
        if (Auth::attempt($infologin)) {
            # Kalau Berhasil
            if (Auth::user()->role =='admin') {
                return redirect('anggota')->with('succes', 'Berhasil Login');
                }

                return redirect('user')->with('succes', 'Berhasil Login');

        }else {
            return redirect ('login')->withErrors('Email yang Dimasukkan Tidak Valid');
            //return 'gagal';
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login')->with('succes','Berhasil logout');
    }

    function register()
    {
        return view('login/register');
    }
    function create(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ], [
            'name.required' => 'Silahkan Masukan Nama',
            'email.required' => 'Silahkan Masukkan Email',
            'email.email'=>'Masukkan Email yang Valid',
            'email.unique'=>'Email nya Sudah Pernah Digunakan, Masukkan email yang Lain',
            'password.required' => 'SIlahkan Masukkan Password',
            'password.min'=>'Password Minimal 5 '
        ]);

        $data =[
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);
        $infologin =[
            'email'=> $request->email,
            'password'=> $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect ('login')->with('succes', Auth::user()->name. 'Berhasil Login');
        }else {
            return redirect ('login')->withErrors('Email yang Dimasukkan Tidak Valid');
        }

    }

    public function show()
    {
        return view('login.register'); // Ganti 'login.show' dengan nama tampilan yang sesuai
    }

}
