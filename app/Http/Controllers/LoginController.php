<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'document' => $request->document,
            'password' => $request->password,
        ], $request->remember)) {
            return redirect()->route('index');
        }

        return back()->withErrors('');
    }
}
