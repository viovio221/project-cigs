<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function index()
    {
        return view('editprofile.show');
    }

    public function create()
    {
        return view('editprofile.create');
    }
}
