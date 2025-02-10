<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register
    public function register()
    {
        return view('User.auth.register');
    }

    // register_store
    public function register_store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3|same:password',
            'phone' => 'required|string|max:15',
        ]);

        unset($fields['password_confirmation']);

        $user = User::create($fields);

        Auth::login($user);

        return to_route('home.index')->with('success', 'register Success!');
    }

    // login
    public function login()
    {
        return view('User.auth.login');
    }

    // login_store
    public function login_store(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:3|',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!auth()->attempt($fields)) {
            return back()->withErrors([
                'email' => 'your crenditial is wrong!'
            ]);
        }
        Auth::login($user);

        return to_route('home.index')->with('success', 'login Success!');

    }

    // logout
    public function logout()
    {
        auth()->logout();
        return to_route('login')->with('success', 'logout success!');
    }

}
