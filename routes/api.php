<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\User\UserController;
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

Route::prefix('/user')->group(function () {
    Route::post('/auth', [UserController::class, 'authWithCode']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::prefix('/product')->group(function () {
        Route::post('/', [ProductController::class, 'add']);
        //Route::get('/{id}', [ProductController::class, 'get']);
        Route::get('/', [ProductController::class, 'index']);
    });
});
