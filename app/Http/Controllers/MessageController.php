<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{

    public function index()
    {
        $profiles = Profile::all();
        $messages = Message::all();
        return view('dashboard.message_crud', compact('messages','profiles'));
    }
    public function message()
    {
        $user = User::query()->whereDoesntHave('messages')->get();

        return view('dashboard.message', ['users' => $user]);
    }
    public function create()
    {
        $profiles = Profile::all();
        $users = User::whereDoesntHave('messages')->get();

        return view('dashboard.message', compact('users', 'profiles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required', // Validasi user_id
            'message' => 'required',
        ]);

        // Buat instance pesan baru
        $message = new Message();
        $message->user_id = $validated['user_id'];
        $message->message = $validated['message'];
        $message->save();

        return redirect()->route('dashboard')->with('success', "Message Successfully Added!");
    }
    public function edit(Message $message)
    {
        $profiles = Profile::all();
        $user = User::all();
        return view('dashboard.message.edit', compact('message', 'user', 'profiles'));
    }

    public function show($id)
    {
        $profiles = Profile::all();
        $mg  = Message::findOrFail($id);
        return view('dashboard.message.show', compact('mg', 'profiles'));
    }

    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);

        $message->update($validated);

        return redirect()->route('dashboard.data_crud')->with('success', "Message successfully updated!");
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('dashboard.data_crud')->with('success', "Message successfully deleted!");
    }
}
