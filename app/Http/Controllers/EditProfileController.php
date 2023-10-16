<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function __construct()
{
    $this->middleware('auth', ['except' => 'logout']);
}

    public function index()
    {
        $users=User::all();
        return view('editprofile.show', compact('users'));
    }

    public function edit()
    {
        return view('editprofile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone_number' => 'required|max:15',
            'date_birth' => 'required|date',
            'address' => 'required|max:100',
            'province' => 'required|max:100',
            'city' => 'required|max:100',
            'district' => 'required|max:100',
            'postal_code' => 'required|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar dokumen
            'tipe' => 'required|in:KTP,SIM,STNK',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->date_birth = $request->date_birth;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->postal_code = $request->postal_code;

        $user->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/document_images', $imageName);

            $existingDocument = UserDocument::where('user_id', auth()->user()->id)->first();

            if ($existingDocument) {
                $existingDocument->tipe = $request->tipe;
                $existingDocument->image = $imageName;
                $existingDocument->save();
            } else {
                $document = new UserDocument();
                $document->user_id = auth()->user()->id;
                $document->tipe = $request->tipe;
                $document->image = $imageName;
                $document->save();
            }
        }

        return redirect()->route('editprofile.show')->with('success', 'Profile updated successfully.');
    }
}
