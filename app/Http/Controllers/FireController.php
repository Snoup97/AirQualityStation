<?php

namespace App\Http\Controllers;

use App\Events\FireDetected;
use Illuminate\Http\Request;

class FireController extends Controller
{

    public function report(Request $request)
    {
        if ($request->get('password') != env('PUSH_KEY')) {
            return abort(404);
        }

        event(new FireDetected($request->get('name')));

        return response()->json(['success' => 'success'], 200);
    }


    public function alarm($name)
    {
        return view('fire', compact('name'));
    }
}
