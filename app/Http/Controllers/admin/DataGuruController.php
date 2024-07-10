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

    public function detailGuru($id)
    {
        $url = URL::current();

        $user = User::find($id);

        return view('admin.guru.edit', with([
            'url' => $url,
            'user' => $user
        ]));
    }

    public function updateGuru(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;

        $user->save();

        session()->put('success', 'Update data sukses');

        return redirect()->route('data-guru');
    }
}
