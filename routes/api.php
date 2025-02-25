<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PlaylistController;
use App\Http\Controllers\API\SongController;
use Illuminate\Support\Facades\Route;


Route::get('songs', [SongController::class, 'index']);
Route::get('songs/{id}', [SongController::class, 'show']);

Route::get('playlists', [PlaylistController::class, 'index']);
Route::get('playlists/{id}', [PlaylistController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('songs', [SongController::class, 'store']);
    Route::put('songs/{id}', [SongController::class, 'update']);
    Route::delete('songs/{id}', [SongController::class, 'destroy']);

    Route::post('playlists', [PlaylistController::class, 'store']);
    Route::put('playlists/{id}', [PlaylistController::class, 'update']);
    Route::delete('playlists/{id}', [PlaylistController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

