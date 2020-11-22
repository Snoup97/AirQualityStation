<?php

namespace App\Http\Controllers;

use App\Events\FireDetected;
use Illuminate\Http\Request;

class FireController extends Controller
{

    public function __invoke(Request $request)
    {
        if ($request->get('password') != '$e€ure0101!?') {
            return abort(404);
        }

        event(new FireDetected($request->get('name')));

        return response()->json(['success' => 'success'], 200);
    }
}
