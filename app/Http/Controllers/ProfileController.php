<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('profile.index', compact('profiles'));

    }

    public function create()
    {
        $profiles =Profile::all();
        return view('profile.create', ['profile' => $profiles]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'history' => 'required',
            'community_bio' => 'required',
            'image' => 'nullable|image',
            'community_structure' => 'required',
        ], [
            'history.required' => "Nama Perlu Diisi",
            'community_bio.required' => "Alamat Perlu Diisi",
            'image.image' => "image harus berupa Image",
            'community_structure.required' => "Kontak Perlu Diisi",
        ]);

        $file_name = $request->file('image');
        if ($file_name == "") {
            Setting::create($request->except(['_token', '_method']));
            return to_route('setting.index')->with(['info' => $request->name . " Berhasil Ditambahkan"]);
        } else {
            $file_name->storeAs('public/image', $file_name->hashName());
            $validated['image'] = Storage::url('public/image');

            $file_name = $request->file('image')->store();
            $validated['image'] = $file_name;
            Setting::create($validated);
            return to_route('setting.index')->with(['info' => $request->name . " Berhasil Ditambahkan"]);
        }
    }

    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('setting.show', compact('setting'));
    }


    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        // $setting = Setting::all();
        $profiles = Profile::findOrFail($id);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $id) {

        $validated = $request->validate([
            'history' => 'required',
            'community_bio' => 'required',
            'image' => 'nullable|image',
            'community_structure' => 'required',
        ], [
            'history.required' => "Nama Perlu Diisi",
            'community_bio.required' => "Alamat Perlu Diisi",
            'image.image' => "image harus berupa Image",
            'community_structure.required' => "Kontak Perlu Diisi",
        ]);

        $image = $request->file('image');

        if ($image === null) {
            $id->update($request->except(['_token', '_method']));
        } else {
            Storage::disk('local')->delete('public/profile_images'.$id->image);
            $imagePath = $image->storeAs('public/profile_images', $image->hashName());
            $validated['image'] = $image->hashName();
            $id->update($validated);
        }

        return redirect()->route('setting.index')->with(['info' => $request->name . " Berhasil Di Update"]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return back()->with('success','Data berhasil dihapus!.');
    }
}
