<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|min:6|max:255|email|unique',
            'phone' => 'required|string|min:11|unique',
            'document' => 'string|unique',
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|min:6|max:255|email',
            'phone' => 'required|string|min:11',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'document' => $request->document,
            'password' => $request->password,
        ], $request->remember)) {
            return redirect()->route('index');
        }

        return back()->withErrors('');
    }
}
