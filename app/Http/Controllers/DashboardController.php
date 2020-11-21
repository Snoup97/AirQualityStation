<?php

namespace App\Http\Controllers;

use App\Measurement;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stations = Measurement::all()->pluck('name')->unique();

        $measurements = [];
        foreach ($stations as $station) {
            $measurement = Measurement::where('name', $station)->get()->last();
            array_push($measurements, $measurement);
        }

        $stations = collect($measurements);

        return view('dashboard', compact('stations'));
    }
}
