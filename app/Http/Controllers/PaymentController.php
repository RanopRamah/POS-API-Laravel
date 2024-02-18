<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {

    public function newPayment(Request $request) {
        try {
            $payment = new Payment();
            $payment->order_id = $request->input("order_id");
            $payment->user_id = $request->input("user_id");
            $payment->amount = $request->input("amount");
            $payment->payment_method = $request->input("payment_method");
            $payment->status = $request->input("status");
            $payment->save();

            return response()->json([
                "message" => "Payment successfully created",
                "payment_id" => $payment->id
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create payment: ' . $e->getMessage()], 401);
        }
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        $payment = Payment::where("id", $id)->first();

        return response()->json([
            "message" => "Get payment by ID: " . $id,
            "data" => $payment
        ], 200);
    }

    public function getByUserId(Request $request) {
        $user_id = $request->user_id;
        $payments = Payment::where("user_id", $user_id)->get();

        $message = "";

        if (sizeof($payments) == 0) $message = "Empty payments";
        else $message = "Found " . sizeof($payments) . " payment";

        return response()->json([
            "message" => $message,
            "payment" => $payments
        ]);
    }

    public function getByStatus(Request $request)
    {
        $status = $request->status;
        $payments = Payment::where("status", $status)->get();

        $message = "";

        if (sizeof($payments) == 0) $message = "Empty payments";
        else $message = "Found " . sizeof($payments) . " payment";

        return response()->json([
            "message" => $message,
            "data" => $payments
        ]);
    }

    public function show() {
        return response()->json([
            "payment" => "sample"
        ], 200);
    }
}
