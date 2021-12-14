<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $item = User::findOrFail(Auth::user()->id);

        return view('pages.profile', [
            'item' => $item
        ]);
    }

    public function update(Request $request)
    {
        $item = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        if ($request->email != $item->email) {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        $item->name = $request->name;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        return redirect()->route('dashboard');
    }
}
