<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function newOrder(Request $request)
    {
        try {
            // TODO: validate

            $order = new Order();
            $order->user_id = $request->input("user_id");
            $order->total_amount = $request->input("total_amount");
            $order->status = $request->input("status");
            $order->save();

            return response()->json([
                "message" => "Order successfully created",
                "data" => $order->id
            ], 201);
            
            // wleawleo

            // Mamahhhhh mau nikah sama Ju Jingyi T_T
            // wbluhookkkkkkkkkkkk T_T T_T T_T T_T
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create order: ' . $e->getMessage()], 401);
        }
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        $order = Order::where("id", $id)->first();

        return response()->json([
            "message" => "Get order by ID: " . $id,
            "data" => $order
        ], 200);
    }
    
    public function getByUserId(Request $request)
    {
        $user_id = $request->user_id;
        $orders = Order::where("user_id", $user_id)->get();

        $message = "";

        if (sizeof($orders) == 0) $message = "Empty orders";
        else $message = "Found " . sizeof($orders) . " order";

        return response()->json([
            "message" => $message,
            "data" => $orders
        ]);
    }
    
    public function getByStatus(Request $request)
    {
        $status = $request->status;
        $orders = Order::where("status", $status)->get();

        $message = "";

        if (sizeof($orders) == 0) $message = "Empty orders";
        else $message = "Found " . sizeof($orders) . " order";

        return response()->json([
            "message" => $message,
            "data" => $orders
        ]);
    }

    public function show()
    {
        return response()->json([
            "order" => "sample"
        ], 200);
    }
}
