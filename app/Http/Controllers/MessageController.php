<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('message.index', compact('messages'));
    }

    public function create()
    {
        $user = User::query()->whereDoesntHave('messages')->get();
        return view('message.create', ['users' => $user]); // Menggunakan 'users' sebagai key
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'message' => 'required',

        ]);

        Message::create($validated);

        return redirect()->route('message.index')->with('berhasil', "$request->nama Berhasil ditambahkan!");
    }

    public function edit(Message $message)
    {
        $user = User::all();
        return view('message.edit', compact('message', 'user'));
    }

    public function update(Request $request, Message $message )
    {
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'message' => 'required',

        ]);

        Message::create($validated);

        return redirect()->route('message.index')->with('berhasil', "$request->nama Berhasil ditambahkan!");
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('message.index')->with('berhasil', "$message->judul Berhasil dihapus!");
    }
}
