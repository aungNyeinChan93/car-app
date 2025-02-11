<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\HomeController;


Route::get('test', function () {
    return view('test.all');
});


Route::redirect('/', 'home', 302);

// auth
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_store'])->name('login.store');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// home
Route::get('home', [HomeController::class, 'index'])->name('home.index');

// customers
Route::resource('customers', CustomerController::class);

// cars
Route::get('cars/favourite', [CarController::class, 'favouriteCars'])->name('cars.favouriteCars');
Route::resource('cars', CarController::class);



