<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// auth routes http://127.0.0.1:8000/api/auth/login
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('posts', PostController::class);//->middleware('auth:sanctum');

Route::post('/order/xendit/create-invoice', [OrderController::class, 'XenditCreateInvoice' ] );
Route::post('/order/midtrans/create-invoice', [OrderController::class, 'MidtransCreateInvoice' ] );
Route::post('/order/midtrans/create-snap-invoice', [OrderController::class, 'MidtransCreateSnapInvoice' ] );

Route::post('/test-controller/{postId}/{userId}', [TestController::class, 'show' ] );


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
