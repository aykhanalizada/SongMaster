<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;


Route::middleware(['auth'])->group(function () {
    Route::get('/people', [PersonController::class, 'index'])->name('person.index');
    Route::get('/create', [PersonController::class, 'create'])->name('person.create');
    Route::post('/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/edit/{id}', [PersonController::class, 'show']);
    Route::post('/people', [PersonController::class, 'update']);
    Route::get('/delete/{id}', [PersonController::class, 'delete']);
});

Route::middleware(['redirectIfAuthenticated'])->group(function(){
    Route::get('/', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->middleware('guest');

    Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
    Route::post('/register', [AuthController::class, 'handleRegister'])->middleware('guest');

});



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
