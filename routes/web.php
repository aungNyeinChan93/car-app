<?php

use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\User\HomeController;


Route::redirect('/', 'client/home', 302);

// 404 page
Route::fallback(function () {
    return view('errors.404');
});


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

    // profile
    Route::put('profile/password-change', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    // car_types
    Route::resource('car-types', CarTypeController::class);

    // customers
    Route::resource('customers', CustomerController::class)->middleware('superAdmin');

    // user management
    Route::get('user-management', [UserManagementController::class, 'index'])->name('user_management.index');
    Route::get('user-management/{user}/edit', [UserManagementController::class, 'edit'])->name('user_management.edit');
    Route::post('user-management/store', [UserManagementController::class, 'store'])->name('user_management.store');

});





