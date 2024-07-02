<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('user_app.login');
    }

    public function doLogin(Request $request)
    {
        return redirect()->route('home');
    }
}
