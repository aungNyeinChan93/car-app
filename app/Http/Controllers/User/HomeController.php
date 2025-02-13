<?php

namespace App\Http\Controllers\User;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //index
    public function index()
    {
        $cars = Car::query()->with(['user'])->latest()->get();
        return view('User.home.index', compact('cars'));
    }
}
