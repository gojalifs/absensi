<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Storage;
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

    public function update()
    {
        $user = Auth::user();

        return view('user_app.profile.edit', with(['user' => $user]));
    }

    public function goUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $name = $request->name;
        $full_name = $request->full_name;
        $email = $request->email;

        $file = $request->file('ava');

        if (isset($file)) {
            $extension = $file->getClientOriginalExtension();
            $filename = "ava_{$id}.$extension";

            $path = $file->storeAs(
                'public/avatar',
                $filename
            );

            // Return the file path or URL
            $path = Storage::url('avatar/' . $filename);
        }


        $user = User::find($id);
        $user->name = $name;
        $user->full_name = $full_name;
        $user->email = $email;

        if (isset($file)) {
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('profile')->with(['user' => $user]);

    }
}
