<?php

namespace App\Http\Controllers;

use App\Jobs\StoreMeasurement;
use App\Measurement;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $measurements = Measurement::all()->sortByDesc('created_at');

        return view('measurements.index', compact('measurements'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        if ($request->get('password') != '$e€ure0101!?') {
            return abort(404);
        }

        $this->dispatch(new StoreMeasurement($request));

        return response()->json(['success' => 'success'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Measurement $measurement
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return back();
    }
}
