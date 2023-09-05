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

    public function create()
    {
        return view('editprofile.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|max:15',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:Male,Female', // Sesuaikan dengan skema gender Anda
            'date_birth' => 'nullable|date', // Sesuaikan dengan skema tanggal lahir Anda
            'address' => 'nullable|max:100', // Sesuaikan dengan skema alamat Anda
            'province' => 'nullable|max:100', // Sesuaikan dengan skema provinsi Anda
            'city' => 'nullable|max:100', // Sesuaikan dengan skema kota Anda
            'district' => 'nullable|max:100', // Sesuaikan dengan skema distrik Anda
            'postal_code' => 'nullable|max:5', // Sesuaikan dengan skema kode pos Anda
        ]);

        // Buat instance User baru
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_birth' => $request->date_birth,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
        ]);

        // Simpan user ke dalam basis data
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('editprofile.show')->with('success', 'Registration successful. Please login.');
    }

}
