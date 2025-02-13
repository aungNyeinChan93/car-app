<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use App\View\Components\Customer;

class CustomerController extends Controller
{
    //index
    public function index()
    {
        return view('User.customers.index');
    }

    // show
    public function show(Request $request, $id)
    {
        $customer = User::findOrFail($id)->load(['roles', 'cars', 'favouriteCars']);
        return $customer;
    }
}
