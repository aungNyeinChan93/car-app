<?php

namespace App\Http\Controllers\User;

use Storage;
use App\Models\Avator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //index
    public function index()
    {
        $user = Auth::user();
        return view('User.profile.index', compact('user'));
    }

    // update
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'avator' => 'nullable'
        ]);

        if ($request->hasFile('avator')) {

            if (isset(auth()->user()->avator->path)) {
                Storage::disk('public')->delete(auth()->user()->avator->path);
                Avator::where('user_id', auth()->user()->id)->delete();
            }

            $path = $request->file('avator')->store('/avators/', 'public');

            Avator::create([
                'user_id' => auth()->user()->id,
                'path' => $path,
            ]);
        }

        Auth::user()->update($fields);

        return back()->with('success', 'Profile Update Success!');
    }

    // change_password
    public function change_password(Request $request)
    {
        $fields = $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
        }

        Auth::user()->update([
            'password' => Hash::make($fields['password']),
        ]);

        return back()->with('success', 'Password have been changed !');

    }
}
