<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.index');
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

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'role' => 'required|in:admin,member,non-member',
            'gender' => 'required|in:Male,Female',
            'date_birth' => 'required|date',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'postal_code' => 'required',
        ]);
        $user = new User([
            'name' => $request->name,
            // 'role' => $request->role,
            'gender' => $request->gender,
            'date_birth' => $request->date_birth,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
        ]);
        $user->save();
        return redirect()->route('login.index')->with('success', 'Data added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
