<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
{
    $profiles = Profile::all();
    $properties = Property::all();
    return view('dashboard.property_crud', compact('properties', 'profiles'));
}

    public function edit($id)
        {
            $properties = Property::findOrFail($id);
            return view('property.edit', compact('properties'));
        }

        public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'headline_ev' => 'required|max:100',
        'text_ev' => 'required|max:100',
        'headline_mg' => 'required|max:100',
        'text_mg' => 'required|max:100',
        'phone_number' => 'required',
        'instagram' => 'required',
        'facebook' => 'required',
        'twitter' => 'required',
        'email' => 'required',
    ]);

    $property = Property::findOrFail($id);

    $property->update($validatedData);

    return redirect()->route('dashboard.data_crud')->with('success', 'Data Property berhasil diperbarui.');
}

public function destroy(Property $property)
{
    $property->delete();

    return redirect()->route('dashboard.data_crud')->with('success', "successfully deleted!");
}
}
