<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;


Route::inertia('/', 'Songs/Index');


Route::resource('songs', SongController::class);
Route::resource('artists', ArtistController::class);

/*Route::middleware(['auth'])->group(function () {

});*/

Route::middleware(['guest'])->group(function () {
    Route::view('/salam', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin']);

    Route::view('/register', 'auth.register')->name('register');;
    Route::post('/register', [AuthController::class, 'handleRegister']);

});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
