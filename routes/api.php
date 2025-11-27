<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// public routes
Route::prefix('/v1')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);       // list all posts
    Route::get('/posts/{id}', [PostController::class, 'show']); // view single post
});

// protected routes
Route::middleware('auth:sanctum')->prefix('/v1')->group(function () {
    // crud
    Route::apiResource('/posts', PostController::class)
        ->only(['store', 'update', 'destroy']);
});