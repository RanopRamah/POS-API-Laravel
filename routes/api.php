<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route AuthController
Route::post('/login', [AuthController::class, 'login']);

// Route UserController
Route::get('/users', [UserController::class, 'show']);

// Route CategorieController
Route::post('/create-categorie', [CategorieController::class, 'store']);
Route::get('/categorie', [CategorieController::class, 'show']);

// Route OrderController
Route::post('/order', [OrderController::class, 'newOrder']);
Route::get('/order/{id}', [OrderController::class, 'getById']);
Route::get('/order/user/{user_id}', [OrderController::class, 'getByUserId']);
Route::get('/order/status/{status}', [OrderController::class, 'getByStatus']);

// Route PaymentController
Route::post('/payment', [PaymentController::class, 'newPayment']);
Route::get('/payment/{id}', [PaymentController::class, 'getById']);
Route::get('/payment/user/{user_id}', [PaymentController::class, 'getByUserId']);
Route::get('/payment/status/{status}', [PaymentController::class, 'getByStatus']);

Route::get("/contoh-json", function () {
    return response()
        ->json([
            "group" => "SNH48",
            "origin" => "Chinese",
            "member" => array(
                "Ju Jingyi",
                "Yuan Yiqi",
                "etc"
            )
        ])
        ->header('Content-Type', 'application/json');
});
