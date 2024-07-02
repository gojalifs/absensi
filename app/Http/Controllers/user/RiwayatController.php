<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL;

class RiwayatController extends Controller
{
    public function index()
    {
        $url = URL::current();
        return view('user_app/riwayat', with([
            'route' => $url
        ]));
    }
}
