<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;
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
            ->orderBy('created_at')
            ->get();

        $result = [];

        foreach ($riwayat as $key => $value) {
            $formattedTime = Carbon::parse($value->created_at)->translatedFormat('H.i');
            $formattedDate = Carbon::parse($value->created_at)->translatedFormat('d F Y');
            $dayOut = Carbon::parse($value->created_at)->translatedFormat('d');
            Log::debug("value pertama {$value->jenis}");
            if ($value->jenis == 'PULANG') {
                $last = count($result) - 1;

                if ($last > 0) {

                    if ($result[$last]->jenis == 'MASUK') {
                        $dayIn = Carbon::parse($value->created_at)->translatedFormat('d');
                        if ($dayIn == $dayOut) {
                            $result[$last]->pulang = $formattedTime;
                        } else {
                            $value->pulang = $formattedTime;
                        }
                    } else {
                        $value->pulang = $formattedTime;
                    }
                } else {
                    $value->pulang = $formattedTime;
                    $value->date = $formattedDate;
                    $data = json_decode(json_encode($value), true);
                    array_push($result, (object) $data);
                }

                Log::debug('di masuk' . json_encode($result));

                continue;
            }
            if ($value->jenis == 'MASUK') {
                $value->masuk = $formattedTime;
            }
            Log::debug(json_encode($result));
            $value->date = $formattedDate;
            $data = json_decode(json_encode($value), true);
            array_push($result, (object) $data);
            // array_splice
        }
        return view('user_app.riwayat.index', with([
            'route' => $url,
            'history' => array_reverse($result),
            'bulan' => $bulan
        ]));
    }
}