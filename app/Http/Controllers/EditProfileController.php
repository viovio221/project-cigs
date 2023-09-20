<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function index()
    {
        return view('editprofile.show');
    }

    public function edit()
    {
        return view('editprofile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone_number' => 'required|max:15',
            'date_birth' => 'nullable|date',
            'address' => 'nullable|max:100',
            'province' => 'nullable|max:100',
            'city' => 'nullable|max:100',
            'district' => 'nullable|max:100',
            'postal_code' => 'nullable|max:5',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->date_birth = $request->date_birth;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->postal_code = $request->postal_code;
        $user->save();
        return redirect()->route('editprofile.show')->with('success', 'Profile updated successfully.');
    }
}

