<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        try {
            // Validasi input dari request
            $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'price' => 'required|numeric|min:0',
                'stock_quantity' => 'required|integer|min:0',
                'category_id' => 'required|exists:categories,id'
            ]);

            // Buat produk baru
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->stock_quantity = $request->input('stock_quantity');
            $product->category_id = $request->input('category_id');
            $product->save();

            // Berikan respons JSON sukses
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product
            ], 201);
        } catch (\Exception $e) {
            // Tangani kesalahan jika ada
            return response()->json(['message' => 'Failed to create product: ' . $e->getMessage()], 500);
        }
    }
}
