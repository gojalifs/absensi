<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('user_app.login');
    }

    public function doLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $credential = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credential)) {
            return redirect()->route('home');
        } else {
            // Todo nanti tambah flash session
            return redirect()->route('login');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
