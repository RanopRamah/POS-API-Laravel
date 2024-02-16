<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{




public function store(Request $request)
{
    try {
        $request->validate([
            'username' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|string'
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Ambil remember token setelah penyimpanan pengguna
        $rememberToken = $user->getRememberToken();

        // Mengembalikan data pengguna yang baru dibuat dan remember token bersama dengan pesan sukses
        return response()->json([
            'message' => 'User created Successfully',
            'user' => $user, // Mengembalikan data pengguna
            'remember_token' => $rememberToken // Mengembalikan remember token
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to create user: ' . $e->getMessage()], 401);
    }
}


    public function show()
    {
    }
}
