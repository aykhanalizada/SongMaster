<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::resource('songs', SongController::class);
});

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin']);

    Route::view('/register', 'auth.register')->name('register');;
    Route::post('/register', [AuthController::class, 'handleRegister']);

});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
