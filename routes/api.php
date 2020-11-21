<?php

use Illuminate\Support\Facades\Route;

Route::post('/measurements', 'MeasurementController@store');

