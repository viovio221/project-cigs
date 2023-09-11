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

        return view('profiles.index', compact('profiles'));


        $profiles = Profile::all();

        return view('dashboard.data_crud', compact('profiles'));

        $dataCount = User::where('role', 'member')->count();


    }

    public function create()
    {
        $profiles =Profile::all();
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
            'history.required' => "Nama Perlu Diisi",
            'community_bio.required' => "Alamat Perlu Diisi",
            'image.image' => "image harus berupa Image",
            'community_structure.required' => "Kontak Perlu Diisi",
        ]);

        $file_name = $request->file('image');
        if ($file_name == "") {
            Profile::create($request->except(['_token', '_method']));
            return to_route('profiles.index')->with(['info' => $request->name . " Berhasil Ditambahkan"]);
        } else {
            $file_name->storeAs('public/image', $file_name->hashName());
            $validated['image'] = Storage::url('public/profile_images');

            $file_name = $request->file('image')->store();
            $validated['image'] = $file_name;
            Profile::create($validated);
            return to_route('profiles.index')->with(['info' => $request->name . " Berhasil Ditambahkan"]);
        }
    }

    public function show($id)
    {
        $profiles = Profile::findOrFail($id);

        return view('profiles.show', compact('profiles'));
    }


    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {

        $profiles = Profile::findOrFail($id);

        return view('profiles.edit', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'history' => 'required',
            'community_bio' => 'required',
            'image' => 'nullable|image',
            'community_structure' => 'required',
        ]);

        $profiles = Profile ::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('profile_images/' . $profiles->image);

            $newImagePath = $request->file('image')->store('public/profile_images');
            $validatedData['image'] = basename($newImagePath);
        }

        $profiles->update($validatedData);

        return redirect()->route('dashboard.data_crud')->with('success', 'profile berhasil diperbarui.');
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
