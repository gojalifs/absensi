<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;
use URL;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->month) {

            $startDate = Carbon::parse($request->month)->startOfMonth();
            $endDate = $startDate->copy()->endOfMonth();
            $monthYear = explode('-', $request->month);
            $month = $monthYear[1];
            $year = $monthYear[0];

            $bulan = $request->month;
        } else {
            $now = Carbon::now();
            $month = $now->month;
            $year = $now->year;

            $bulan = $now->format('Y-m');
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now();
        }

        $dates = [];
        while ($startDate->lte($endDate)) {
            $dateString = $startDate->format('Y-m-d');
            $m = Carbon::parse($dateString);
            $date = (object) [
                'date' => $dateString,
            ];

            if ($m->isWeekend()) {
                $date->kerja = 'libur';
            } else {
                $date->kerja = 'kerja';
            }

            array_push($dates, $date);
            $startDate->addDay();
        }

        $url = URL::current();
        $url = explode('/', $url);
        $user = Auth::user()->id;

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
            ->where('users.id', '=', $user)
            ->whereMonth('absensis.created_at', '=', $month)
            ->whereYear('absensis.created_at', '=', $year)
            ->select(['*', 'absensis.jenis', 'absensis.created_at'])
            ->orderBy('absensis.created_at')
            ->get();

        $result = [];

        foreach ($dates as $date) {
            $data = (object) [
                'date' => $date->date,
                'kerja' => $date->kerja,
                'masuk' => '',
                'pulang' => '',
                'p_masuk' => '',
                'p_pulang' => '',
                'keterangan' => '',
            ];

            $any = false;
            foreach ($riwayat as $key => $r) {
                $d = Carbon::parse($r->created_at)->format('Y-m-d');
                if ($d != $date->date) {
                    break;
                }

                $data->date = $d;
                $clock = Carbon::parse($r->created_at)->format('H.i');

                if ($r->jenis == 'MASUK') {
                    $data->masuk = $clock;
                    $data->p_masuk = $r->photo_path;
                } else {
                    $data->pulang = $clock;
                    $data->p_pulang = $r->photo_path;
                }

                if ($data->p_masuk != '' && $data->p_pulang != '') {
                    $data->keterangan = 'Hadir (Dalam Lokasi)';
                } else if ($data->p_masuk == '') {
                    $data->keterangan = 'Tidak Absen Masuk';
                } else if ($data->p_pulang == '') {
                    $data->keterangan = 'Tidak Absen Pulang';
                } else if ($r->izin != '') {
                    $data->keterangan = $r->izin;
                }

                $any = true;
                unset($riwayat[$key]);
            }
            array_push($result, $data);
            $any = false;
        }

        return view('user_app.riwayat.index', with([
            'route' => end($url),
            'history' => array_reverse($result),
            'bulan' => $bulan,
            'sidebar_data' => parent::sidebarMenu()
        ]));
    }
}