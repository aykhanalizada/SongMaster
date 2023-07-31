<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/create', [PersonController::class, 'showCreate'])->name('gocreate');
    Route::post('/create', [PersonController::class, 'create'])->name('submit-form');
    Route::get('/home', [PersonController::class, 'home'])->name('home');
    Route::get('edit/{id}', [PersonController::class, 'showData']);
    Route::post('/home', [PersonController::class, 'edit']);
    Route::get('/delete/{id}', [PersonController::class, 'delete']);
});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->middleware('guest');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->middleware('guest');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
