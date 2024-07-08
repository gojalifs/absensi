<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use URL;

class ProfileController extends Controller
{
    public function index()
    {
        $url = URL::current();
        $user = Auth::user();        

        return view('user_app.profile.profile', with([
            'route' => $url,
            'user' => $user
        ]));
    }
}
