<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function store(Request $request)
    {
    }

    public function getById(Request $request)
    {
        $id = $request->id;

        return response()->json([
            "order" => "todo get by id: " . $id
        ], 200);
    }

    public function show()
    {
        return response()->json([
            "order" => "sample"
        ], 200);
    }
    // nap baca cet dc
}
