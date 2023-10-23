<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index()
    {
        return view('login.otp');
    }

    private function generateOTP()
    {
        $otpCode = rand(100000, 999999);

        session(['otpCode' => $otpCode]);

        return $otpCode;
    }
    public function store(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
        ]);

        $otpCode = $this->generateOTP();

        $request->session()->put('phone_number', $request->phone_number);

        return redirect()->route('login.index')->with('success', 'Code OTP Sucessfull! Please log-in first!');
    }
}

