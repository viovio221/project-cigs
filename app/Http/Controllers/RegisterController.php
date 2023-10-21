<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\NotificationController;


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
            'phone_number' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 $otpCode = $this->generateOTP();

 $recipientNumber = $request->phone_number;
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $notificationController = new NotificationController();
    $notificationController->sendOTPviaWhatsApp($recipientNumber, $otpCode);

    return redirect('/login')->with('success', 'Registration successful! Please log-in');
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
