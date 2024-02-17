<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "user_id",
        "amount",
        "payment_method",
        "status", // Gagal, Berhasil, Pending
        "created_at"
    ];
}
