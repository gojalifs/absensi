<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function __construct()
    {

        // Set locale to Indonesian
        Carbon::setLocale('id');
    }
    public function store(Request $request)
    {
        try {
            $user = Auth::user()->id;
            $tanggal = $request->tanggal;
            $keterangan = $request->keterangan;
            $catatan = $request->catatan;
            $file = $request->file('suket');
            $unique = uniqid('q');

            $extension = $file->getClientOriginalExtension();
            $filename = "izin_{$user}_{$unique}.$extension";

            $path = $file->storeAs(
                'izin',
                $filename
            );

            $izin = new Izin;
            $izin->user_id = Auth::user()->id;
            $izin->tanggal = $tanggal;
            $izin->keterangan = $keterangan;
            $izin->photo_path = $path;
            $izin->catatan = $catatan;

            $izin->save();

            return redirect()->route('izin_success');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengajukan izin']);
        }
    }

    public function successIndex(Request $request)
    {
        $izindata = Izin::find(25);

        // Format tanggal
        $carbon = Carbon::parse($izindata->tanggal);
        $formattedDate = $carbon->translatedFormat('d F Y');

        $izindata->tanggal = $formattedDate;
        $user = $izindata->user;

        $data = [
            'user' => $user,
            'izin' => $izindata
        ];

        return view('user_app/izin/sukses', with($data));
    }
}
