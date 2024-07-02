<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;

class HomeController extends Controller
{
    public function index()
    {
        $url = URL::current();
        $user = new \stdClass();
        $user->name = 'Fajar';
        $user->path = 'https://htmlstream.com/preview/unify-v2.6/assets/img-temp/400x450/img5.jpg';


        return view('user_app.home', with([
            'route' => $url,
            'user' => $user
        ]));
    }
}
