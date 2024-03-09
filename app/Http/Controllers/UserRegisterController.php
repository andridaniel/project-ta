<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.userregister');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'role' => 'required|in:siswa,guru_pembimbing,admin',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',

        ]);

        // Create a new user instance

        $user = User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // Redirect or perform other actions as needed
        return redirect()->route('userregister');
    }
}
