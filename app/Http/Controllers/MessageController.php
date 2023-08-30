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

    public function create()
    {
        $user = User::query()->whereDoesntHave('messages')->get();
        return view('dashboard.message.create', ['users' => $user]); // Menggunakan 'users' sebagai key
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'message' => 'required',

        ]);

        Message::create($validated);

        return redirect()->route('dashboard.data_crud')->with('berhasil', "$request->nama Berhasil ditambahkan!");
    }

    public function edit(Message $message)
    {
        $user = User::all();
        return view('dashboard.message.edit', compact('message', 'user'));
    }

    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);

        $message->update($validated);

        return redirect()->route('dashboard.data_crud')->with('berhasil', "$request->name Berhasil diperbarui!");
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('dashboard.data_crud')->with('berhasil', "$message->name Berhasil dihapus!");
    }

}
