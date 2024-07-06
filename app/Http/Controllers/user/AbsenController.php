<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function checkInOutIndex(string $jenis)
    {
        $user = new \stdClass();
        $user->name = 'Fajar';
        $user->fullName = 'Fajar Sidik Prasetio';

        if ($jenis == 'izin') {
            return view('user_app.absen.izin');
        }

        return view(
            'user_app.absen.checkin_out',
            with(
                [
                    'jenis' => $jenis,
                    'user' => $user
                ]
            )
        );
    }

    public function store(Request $request)
    {
        // return redirect()->route('absenSuccess');
        $jenis = $request->jenis;
        return response()->json([
            'success' => true,
            'redirect' => route('absenSuccess', $jenis),
        ]);
        // $image = $request->imageData;
        // $lat = $request->latitude;
        // $lng = $request->longitude;

        // dd("$lat $lng");
        // dd($image);
        // return view('user_app.absen.sukses');
    }

    public function absenSukses()
    {
        return view('user_app.absen.sukses');
    }
}
