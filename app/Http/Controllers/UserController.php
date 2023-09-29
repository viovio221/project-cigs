<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth', ['except' => 'logout']);
     }
    public function index()
    {
        $profiles = Profile::all();
        $users = User::paginate(20);

        return view('users.index', compact('users', 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Ambil data pengguna berdasarkan ID
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:admin,member,non-member',
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User data updated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}
