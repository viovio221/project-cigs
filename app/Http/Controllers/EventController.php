<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Message;
use App\Models\CommentPost;
use App\Models\News;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class EventController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $events = Event::all();
        $messages = Message::all();
        $comment_posts = CommentPost::all();
        $news = News::all();
        $profiles = Profile::all();

        return view('dashboard.data_crud', compact('events', 'messages', 'comment_posts', 'news', 'profiles', 'properties'));
    }

    public function create()
    {
        return view('dashboard.events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' =>'required|image|mimes:png,jpg,jpeg', // Add image validation rule
        ]);
        $image = $request->file('image');
        $image->storeAs('public/event_images', $image->hashName());

        Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('dashboard.data_crud')->with('success', 'Event successfully added.');
    }

    public function show($id)
{
    $event = Event::findOrFail($id);
    return view('dashboard.eventdesc1', compact('event'));
}



    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('event_images/' . $event->image);

            $newImagePath = $request->file('image')->store('public/event_images');
            $validatedData['image'] = basename($newImagePath);
        }

        $event->update($validatedData);

        return redirect()->route('dashboard.data_crud')->with('success', 'Event successfully updated.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.data_crud')->with('success', 'Event successfully deleted.');
    }
}
