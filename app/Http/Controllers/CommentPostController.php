<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\CommentPost;
use Illuminate\Http\Request;

class CommentPostController extends Controller
{
    public function index()
    {
        $comment_post = CommentPost::all();
        return view('dashboard.data_crud', ['comment_postlist' => $comment_post]);
    }

    public function create()
    {
        $event = Event::query()->whereDoesntHave('comment_posts')->get();

        return view('dashboard.commentpost.create', ['event' => $event]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'event_id' => 'required',
            'content' => 'required|string',

        ]);

        CommentPost::create($validated);

        return redirect()->route('dashboard.data_crud')->with('success', "$request->nama Berhasil ditambahkan!");
    }
    public function edit(CommentPost $comment_post)
    {
        $event = Event::all();
        return view('dashboard.commentpost.edit', compact('comment_post', 'event'));
    }

    public function update(Request $request, CommentPost $comment_post )
    {
        $validated = $request->validate([
            'username' => 'required',
            'event_id' => 'required',
            'content' => 'required|string',

        ]);

        $comment_post->update($validated);

        return redirect()->route('dashboard.data_crud')->with('success', "$request->judul Berhasil diubah!");
    }

    public function destroy(CommentPost $comment_post)
    {
        $comment_post->delete();

        return redirect()->route('dashboard.data_crud')->with('success', "$comment_post->judul Berhasil dihapus!");
    }
}
