<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
//    Route::inertia('/', 'Songs/Index');

    Route::resource('songs', SongController::class);
    Route::resource('users', UserController::class);
    Route::resource('playlists', PlaylistController::class);
});

Route::middleware(['guest'])->group(function () {
    Route::inertia('/', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin']);

    Route::view('/register', 'auth.register')->name('register');;
    Route::post('/register', [AuthController::class, 'handleRegister']);

});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
