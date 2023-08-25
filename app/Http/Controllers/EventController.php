<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('dashboard/data_crud', compact('events'));
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

        return redirect()->route('dashboard.data_crud')->with('success', 'Event berhasil ditambahkan.');
    }

    // public function store(Request $request)
    // {
    //     // Lakukan validasi data yang diinputkan
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'date' => 'required',
    //         'location' => 'required',
    //         'description' => 'required',
    //         'image'=>'required|image|mimes:png,jpg,jpeg',
    //         'link'=>'required',

    //         // tambahkan validasi lainnya sesuai kebutuhan
    //     ]);

    //     // Simpan data ke database
    //     Event::create($validatedData);

    //     return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan.');
    // }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.show', compact('event'));
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
        'image' => 'image', // Update image validation rule
    ]);

    $event = Event::findOrFail($id);

    if ($request->hasFile('image')) {
        $newImagePath = $request->file('image')->store('event_images', 'local');
        $validatedData['image'] = $newImagePath;

        // Delete the old image if needed
        Storage::disk('local')->delete($event->image);
    }

    $event->update($validatedData);

    return redirect()->route('dashboard.data_crud')->with('success', 'Event berhasil diperbarui.');
}

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.data_crud')->with('success', 'Event berhasil dihapus.');
    }
}
