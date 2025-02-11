<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //index
    public function index()
    {
        return view('User.customers.index');
    }
}
