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
        $nonMemberUsers = User::where('role', 'non-member')->get();
        $profiles = Profile::all();
        $users = User::paginate(20);

        return view('users.index', compact('users', 'profiles', 'nonMemberUsers'));
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
        $profiles = Profile::all();
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user', 'profiles'));
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
public function confirmMemberStatus(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);
        $user->update(['role' => 'member']);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}


}
