<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            $user = Auth::guard('web')->user();

            if ($user->role === 'non-member') {
                $recipientNumber = $user->phone_number;
                $message = "{$user->name} Welcome to the Wayang Riders Motor Community! Thank you for being a part of our community. If you are not a member yet, this is the perfect time to join! Let's together build new memories and experiences in the Wayang Riders motor community. Please complete your profile through the following link: https://wayang.kakara.my.id/editprofile";

                $response = Http::post('https://wag.cigs.web.id/send-message', [
                    'api_key' => 'ZMNgdCuH1Vi0OCQ6Recg8ZB9UPy68B',
                    'sender' => '6282128078893',
                    'number' => $recipientNumber,
                    'message' => $message,
                ]);
            }

            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP code.'])->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login.index');
    }
}
