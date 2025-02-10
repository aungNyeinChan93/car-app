<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //register
    public function register()
    {
        return view('User.auth.register');
    }

    // login
    public function login()
    {
        return view('User.auth.login');
    }
}
