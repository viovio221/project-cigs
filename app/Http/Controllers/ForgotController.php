<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ForgotController extends Controller
{
    public function index()
    {
        return view("forgot/index");
    }

    public function show()
    {
        return view('forgot.newpass');
    }
}
