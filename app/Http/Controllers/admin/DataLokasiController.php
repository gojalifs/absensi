<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DataLokasiController extends Controller
{
    public function index()
    {
        $url = URL::current();
        $location = Location::first();

        return view('admin.location.index', with([
            'url' => $url,
            'location' => $location
        ]));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $lat = $request->lat;
        $lng = $request->lng;
        $rad = $request->rad;

        $loc = Location::find($id) ?: new Location();

        $loc->lat = $lat;
        $loc->lng = $lng;
        $loc->radius = $rad;
        $loc->save();

        return redirect()->back();
    }
}
