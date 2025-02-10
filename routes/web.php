<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('test', function () {
    return view('test.all');
});

Route::get('home', [HomeController::class, 'index'])->name('home.index');

// auth
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'login'])->name('login');


