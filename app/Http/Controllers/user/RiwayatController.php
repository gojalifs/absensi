<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use URL;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $url = URL::current();

        if ($request->month) {
            $monthYear = explode('-', $request->month);
            $month = $monthYear[1];
            $year = $monthYear[0];

            $bulan = $request->month;
        } else {
            $now = Carbon::now();
            $month = $now->month;
            $year = $now->year;

            $bulan = $now->format('Y-m');
        }

        $riwayat = DB::table('absensis')
            ->join('users', 'absensis.user_id', '=', 'users.id')
            ->whereMonth('absensis.created_at', '=', $month)
            ->whereYear('absensis.created_at', '=', $year)
            ->select(['absensis.jenis', 'absensis.created_at'])
            ->get();

        $riwayat = $riwayat->map(function ($value) {
            $formattedDate = Carbon::parse($value->created_at)->translatedFormat('d F Y');
            $formattedTime = Carbon::parse($value->created_at)->translatedFormat('H.i.s');
            if ($value->jenis == 'MASUK') {
                $value->masuk = $formattedTime;
            } else {
                $value->pulang = $formattedTime;
            }
            $value->date = $formattedDate;
            return $value;
        });

        return view('user_app.riwayat.index', with([
            'route' => $url,
            'history' => $riwayat,
            'bulan' => $bulan
        ]));
    }
}