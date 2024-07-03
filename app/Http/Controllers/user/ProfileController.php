<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;

class ProfileController extends Controller
{
    public function index()
    {
        $url = URL::current();
        $user = new \stdClass();
        $user->name = 'Fajar';
        $user->path = 'https://media.istockphoto.com/id/1386479313/photo/happy-millennial-afro-american-business-woman-posing-isolated-on-white.webp?b=1&s=170667a&w=0&k=20&c=ahypUC_KTc95VOsBkzLFZiCQ0VJwewfrSV43BOrLETM=';


        return view('user_app.profile', with([
            'route' => $url,
            'user' => $user
        ]));
    }
}
