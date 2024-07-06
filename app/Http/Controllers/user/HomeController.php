<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use URL;

class HomeController extends Controller
{
    public function index()
    {
        $url = URL::current();
        $user = Auth::user();     

        return view('user_app.home', with([
            'route' => $url,
            'user' => $user
        ]));
    }
}
