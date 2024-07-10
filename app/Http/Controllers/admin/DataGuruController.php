<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DataGuruController extends Controller
{
    public function index()
    {
        $url = URL::current();

        $users = User::where('role', 'USER')->get();

        return view('admin.data-guru', with([
            'url' => $url,
            'users' => $users
        ]));
    }
}
