<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\NotificationController;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }
    public function create()
    {
        return view('login.register')->with([
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    private function generateOTP()
    {
        $otpCode = rand(100000, 999999);

        session(['otpCode' => $otpCode]);

        return $otpCode;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'password' => 'required|min:6|confirmed',
        ]);

        $otpCode = $this->generateOTP();

        $recipientNumber = $request->phone_number;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'otp_code' => $otpCode,
            'otp_expiry_time' => now()->addMinutes(5),
        ]);

        $notificationController = new NotificationController();

        try {
            $notificationController->sendOTPviaWhatsApp($recipientNumber, $otpCode);
            $user->save();
            return redirect('/login')->with('success', 'Registration successful! Please log-in');
        } catch (\Exception $e) {
            Alert::error('No connection', 'Please try again')->persistent(true);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('login.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
