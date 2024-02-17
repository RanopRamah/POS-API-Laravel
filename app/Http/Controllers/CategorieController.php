<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255'
            ]);

            $categorie = new Category();
            $categorie->name = $request->name;
            $categorie->save();

            return response()->json([
                'message' => 'Successfully created categorie',
                'categories' => $categorie
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create categorie' . $e->getMessage()], 404);
        }
    }

    public function show()
    {
        $categorie = Category::all();
        return response()->json(['categories' => $categorie], 200);
    }
}
