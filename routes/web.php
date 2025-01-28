<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/people', [PersonController::class, 'index'])->name('person.index');
    Route::get('/create', [PersonController::class, 'create'])->name('person.create');
    Route::post('/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/edit/{id}', [PersonController::class, 'show']);
    Route::post('/people', [PersonController::class, 'update']);
    Route::get('/delete/{id}', [PersonController::class, 'delete']);
});

Route::middleware(['redirectIfAuthenticated'])->group(function () {
    Route::view('/', 'auth.login')->middleware('guest')->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->middleware('guest');

    Route::view('/register', 'auth.register')->middleware('guest')->name('register');;
    Route::post('/register', [AuthController::class, 'handleRegister'])->middleware('guest');

});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
