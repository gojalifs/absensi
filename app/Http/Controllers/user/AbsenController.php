<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;
use Storage;

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
        try {
            $user = Auth::user()->id;

            // Ambil data gambar
            $file = $request->imageData;
            $imageParts = explode(";base64,", $file);
            $imageType = str_replace('data:image/', '', $imageParts[0]);
            $imageData = base64_decode($imageParts[1]);
            // Create a unique file name
            $unique = uniqid('absen');
            $fileName = "absen_{$user}_{$request->jenis}_{$unique}.$imageType";

            // Save the image to the public storage
            Storage::disk('public')->put('images/' . $fileName, $imageData);

            // Return the file path or URL
            $filePath = Storage::url('images/' . $fileName);

            $absensi = new Absensi;
            $absensi->user_id = $user;
            $absensi->jenis = $request->jenis;
            $absensi->lat = $request->lat;
            $absensi->lng = $request->lng;
            $absensi->photo_path = $filePath;

            $absensi->save();
            $data = $absensi;

            session()->put('absen_data', $data);

            return response()->json([
                'success' => true,
                'redirect' => route('absenSuccess', $request->jenis),
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengajukan izin']);
        }
    }

    public function absenSukses()
    {
        $data = session()->get('absen_data');
        $carbon = Carbon::parse($data->created_at);
        $time = $carbon->translatedFormat('h:i a');
        $data->jam = $time;
        return view('user_app.absen.sukses', with(['data' => $data]));
    }
}
