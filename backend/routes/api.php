<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\WeatherController;

// Public Routes (No Authentication Required)
Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Publicly accessible routes for viewing farms, crops, weather, livestock, and markets
Route::apiResource('farms', FarmController::class)->only(['index', 'show']);
Route::apiResource('crops', CropController::class)->only(['index', 'show']);
Route::apiResource('weathers', WeatherController::class)->only(['index', 'show']);
Route::apiResource('livestocks', LivestockController::class)->only(['index', 'show']);
Route::apiResource('markets', MarketController::class)->only(['index', 'show']);

//  Protected Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::apiResource('users', UserController::class)->except(['create', 'edit']);
    Route::apiResource('farms', FarmController::class)->except(['index', 'show']);
    Route::apiResource('crops', CropController::class)->except(['index', 'show']);
    Route::apiResource('weathers', WeatherController::class)->except(['index', 'show']);
    Route::apiResource('livestocks', LivestockController::class)->except(['index', 'show']);
    Route::apiResource('markets', MarketController::class)->except(['index', 'show']);

    // Logout
    Route::post('/auth/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    });
});






