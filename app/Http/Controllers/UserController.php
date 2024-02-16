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

        return response()->json(['message' => 'User created Successfully'], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to create user: ' . $e->getMessage()], 401);
    }
}

    public function show(){}
}
