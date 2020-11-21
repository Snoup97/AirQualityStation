<?php

namespace App\Http\Controllers;

use App\Measurement;

class StationController extends Controller
{

    public function show($station)
    {
        $measurements = Measurement::where('name', $station)->get();

        return view('stations.show', compact('measurements', 'station'));
    }
}
