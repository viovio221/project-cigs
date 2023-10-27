<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            $profile = Profile::first();
            $apiKey = $profile->api_key;
            $sender = $profile->sender;

            $user->update(['role' => 'member']);

            $recipientNumber = $user->phone_number;

            $message = "Hello, {$user->name} Wayang Riders!\n\n";
            $message .= "Congratulations! You have been accepted as a member of the Wayang Riders community. Now, you can enjoy all the features and benefits we offer. If you have any questions or need assistance, don't hesitate to contact our support team. Welcome to the wonderful world of Wayang Riders motorcycle community! 🛵";

            $client = new Client();

            $response = $client->post($profile->endpoint, [
                'form_params' => [
                    'api_key' => $apiKey,
                    'sender' => $sender,
                    'number' => $recipientNumber,
                    'message' => $message,
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Failed to send WhatsApp message']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }


public function updateRole(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'role' => 'required',
    ]);

    $user = User::find($validatedData['user_id']);
    $user->role = $validatedData['role'];
    $user->save();

    return redirect()->back();
}
public function getUserDetails($userId) {
    $user = User::find($userId);

    return response()->json([
        'data' => $user,
    ]);

}

}
