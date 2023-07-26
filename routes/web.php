<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',[PersonController::class,'showCreate'])->name('gocreate');

Route::post('/create',[PersonController::class,'create'])->name('submit-form');
Route::get('index',[PersonController::class,'index'])->name('index');

Route::get('edit/{id}',[PersonController::class,'showData']);
Route::post('/index',[PersonController::class,'edit']);
Route::get('/delete/{id}',[PersonController::class,'delete']);
