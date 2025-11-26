<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// public routes

// authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

// logout
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);