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

    public function review()
    {
        $event = Event::all();
        return view('dashboard.review.event_review', ['events' => $event]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'event_id' => 'required|exists:events,id',
            'content' => 'required|string',
            'rating' => 'required|integer',
        ], [
            'username.required' => 'Username is required.',
            'event_id.required' => 'Event ID is required.',
            'event_id.exists' => 'Invalid Event ID.',
            'content.required' => 'Content is required.',
            'content.string' => 'Content must be a text.',
            'rating.required' => 'Rating is required.',
            'rating.integer' => 'Rating must be a number.',
        ]);

        $existingComment = CommentPost::where('username', $validated['username'])
            ->where('event_id', $validated['event_id'])
            ->first();

        if ($existingComment) {
            return redirect()->back()->with('warning', 'You have already provided a comment for this event, please choose another event.');
        }

        $commentPost = new CommentPost;
        $commentPost->username = $validated['username'];
        $commentPost->event_id = $validated['event_id'];
        $commentPost->content = $validated['content'];
        $commentPost->rating = $validated['rating'];
        $commentPost->save();

        return redirect()->route('dashboard.data_crud')->with('success', "$validated[username] Successfully added!");
    }

public function show($id)
{
    $comment_post  = CommentPost::findOrFail($id);
    return view('dashboard.commentpost.show', compact('comment_post'));
}

    public function edit(CommentPost $comment_post)
    {
        $event = CommentPost::all();
        return view('dashboard.commentpost.edit', compact('comment_post', 'event'));
    }

    public function update(Request $request, CommentPost $comment_post )
    {
        $validated = $request->validate([
            'username' => 'required',
            'event_id' => 'required',
            'content' => 'required|string',
            'rating' => 'required|integer',
        ]);

        $comment_post->update($validated);

        return redirect()->route('dashboard.data_crud')->with('success', "$request->judul Successfuly updated!");
    }
    public function destroy(CommentPost $comment_post)
    {
        $comment_post->delete();

        return redirect()->route('dashboard.data_crud')->with('success', "$comment_post->judul Successfully deleted!");
    }
}
