<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    //index
    public function index()
    {
        $users = User::query()->with(['roles', 'cars', 'favouriteCars'])->latest()->get();
        return view('Admin.user_management.index', compact('users'));
    }

    // edit
    public function edit(User $user)
    {
        $roles = Role::query()->get();
        return view('admin.user-management.edit', compact('user', 'roles'));
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'roles' => 'nullable'
        ]);

        $user = User::findOrFail($request->id);

        $user->roles()->sync($request->roles);

        return to_route('user_management.index')->with('success', 'User Roles update Success!');

    }
}
