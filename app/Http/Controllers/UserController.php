<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show()
    {
        $users = User::all();

        if ($users->isEmpty()){
            return response()->json(['message' => 'No user yet'], 404);
        }

        return response()->json(['users' => $users], 200);
    }
}
