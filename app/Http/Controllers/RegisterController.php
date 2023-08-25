<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
             'role' => 'required|in:admin,member,non-member',
             'gender' => 'required|in:Male,Female',
             'date_birth' => 'required',
             'phone_number' => 'required',
             'email' => 'required|email|unique:users,email', // Replace 'users' with your table name
             'password' => 'required|min:6',
             'address' => 'required',
             'province' => 'required',
             'city' => 'required',
             'district' => 'required',
             'postal_code' => 'required',
         ]);

         // Create a new user record
         $user = new User();
         $user->name = $request->name;
         $user->role = $request->role;
         $user->gender = $request->gender;
         $user->date_birth = $request->date_birth;
         $user->phone_number = $request->phone_number;
         $user->email = $request->email;
         $user->password = bcrypt($request->password); // Hash the password
         $user->address = $request->address;
         $user->province = $request->province;
         $user->city = $request->city;
         $user->district = $request->district;
         $user->postal_code = $request->postal_code;
         $user->join_date = now(); // Assuming you want to set the join date to the current date and time
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
