<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Facades\Log;

Log::debug('test');

class DataAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $qjenis = $request->jenis;
        $qdate = $request->date;

        $url = URL::current();

        $now = Carbon::now();
        $date = $qdate ?: $now->toDateString();

        $today = $now->translatedFormat('l, d F Y');

        if (isset($qjenis) && $qjenis != 'semua') {
            $absensis = Absensi::join('users', 'absensis.user_id', '=', 'users.id')
                ->whereDate('absensis.created_at', '=', $date)
                ->where('absensis.jenis', '=', $qjenis)
                ->select('*')
                ->selectRaw('absensis.id as absen_id')
                ->get();
        } else {
            $absensis = Absensi::join('users', 'absensis.user_id', '=', 'users.id')
                ->whereDate('absensis.created_at', '=', $date)
                ->select('*')
                ->selectRaw('absensis.id as absen_id')
                ->get();
        }

        $result = [];

        foreach ($absensis as $value) {
            $data = (object) [];

            $data->id = $value->absen_id;
            $data->full_name = $value->full_name;
            $data->date = Carbon::parse($value->created_at)->translatedFormat('d F Y');
            $data->time = Carbon::parse($value->created_at)->translatedFormat('H.i');
            $data->jenis = $value->jenis;
            $data->selfie = $value->photo_path;
            $data->lokasi = [
                'lat' => $value->lat,
                'lng' => $value->lng,
            ];

            $data = json_decode(json_encode($data), true);
            array_push($result, (object) $data);
        }

        // dd(json_encode($result));

        return view('admin.absensi.index', with([
            'jenis' => $qjenis,
            'day' => $today,
            'date' => $date,
            'url' => $url,
            'absensis' => (object) $result
        ]));
    }
}
