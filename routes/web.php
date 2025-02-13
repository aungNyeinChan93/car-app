<?php

use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\HomeController;


Route::redirect('/', 'client/home', 302);


// Guest
Route::group(['prefix' => 'client', 'middleware' => ['guest']], function () {

    // auth
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'register_store'])->name('register.store');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_store'])->name('login.store');

});


// Auth
Route::group(['prefix' => 'client', 'middleware' => ['auth']], function () {

    // auth
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // home
    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    // cars
    Route::get('cars/favourite', [CarController::class, 'favouriteCars'])->name('cars.favouriteCars');
    Route::resource('cars', CarController::class);

    // cars
    Route::get('cars/favourite', [CarController::class, 'favouriteCars'])->name('cars.favouriteCars');
    Route::resource('cars', CarController::class);
});


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    // car_types
    Route::resource('car-types', CarTypeController::class);

    // customers
    Route::resource('customers', CustomerController::class)->middleware('superAdmin');

});


// 404 page
Route::fallback(function () {
    return view('errors.404');
});




