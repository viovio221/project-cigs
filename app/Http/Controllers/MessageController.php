<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        dd($messages);
        return view('dashboard.data_crud', compact('messages'));
    }
    public function message()
    {
        $user = User::query()->whereDoesntHave('messages')->get();

        return view('dashboard.message', ['users' => $user]);
    }
    public function create()
    {
        // Dapatkan pengguna yang tidak memiliki pesan
        $users = User::whereDoesntHave('messages')->get();

        return view('dashboard.message', compact('users'));
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

        return redirect()->route('dashboard')->with('success', "Pesan berhasil ditambahkan!");
    }
    public function edit(Message $message)
    {
        $user = User::all();
        return view('dashboard.message.edit', compact('message', 'user'));
    }

    public function show($id)
    {
        $mg  = Message::findOrFail($id);
        return view('dashboard.message.show', compact('mg'));
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
