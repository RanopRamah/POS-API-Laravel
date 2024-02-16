<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try{
       $request->validate([
        'username' => 'required|max:255|string',
        'password' => 'required|min:8|string'
       ]);

       User::create([
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password'))
       ]);

       return response()->json(['message' => 'User created Successfully'], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to create user' . $e->getMessage()], 401);
    }
       
    }
    public function show(){}
}
