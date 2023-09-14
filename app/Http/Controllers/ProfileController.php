<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $dataCount = User::where('role', 'member')->count();
        return view('profile.history', compact('profiles', 'dataCount'));
    }

    public function create()
    {
        $profiles = Profile::all();
        return view('profiles.create', ['profile' => $profiles]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'history' => 'required',
            'community_bio' => 'required',
            'image' => 'nullable|image',
            'community_structure' => 'required',
        ], [
            'history.required' => "Name is required",
            'community_bio.required' => "Address is required",
            'image.image' => "Image must be in image format",
            'community_structure.required' => "Contact is required",
        ]);

        $file_name = $request->file('image');
        if ($file_name == "") {
            Profile::create($request->except(['_token', '_method']));
            return redirect()->route('profiles.index')->with(['info' => $request->name . " Successfully added"]);
        } else {
            $file_name->storeAs('public/image', $file_name->hashName());
            $validated['image'] = Storage::url('public/profile_images');

            $file_name = $request->file('image')->store();
            $validated['image'] = $file_name;
            Profile::create($validated);
            return redirect()->route('profiles.index')->with(['info' => $request->name . " Successfully added"]);
        }
    }

    public function show($id)
    {
        $profiles = Profile::findOrFail($id);

        return view('profiles.show', compact('profiles'));
    }

    public function edit(string $id)
    {
        $profiles = Profile::findOrFail($id);

        return view('profiles.edit', compact('profiles'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'history' => 'required',
            'community_bio' => 'required',
            'image' => 'nullable|image',
            'community_structure' => 'required',
        ]);

        $profiles = Profile::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('profile_images/' . $profiles->image);

            $newImagePath = $request->file('image')->store('public/profile_images');
            $validatedData['image'] = basename($newImagePath);
        }

        $profiles->update($validatedData);

        return redirect()->route('dashboard.data_crud')->with('success', 'Profile successfully updated.');
    }

    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return back()->with('success', 'Data successfully deleted.');
    }
}
