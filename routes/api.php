<?php

use Illuminate\Support\Facades\Route;

Route::post('/measurements', 'MeasurementController@store');

Route::post('/fire', 'FireController');

