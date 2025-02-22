<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SongController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('songs', SongController::class);

    Route::post('logout', [AuthController::class, 'logout']);
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

