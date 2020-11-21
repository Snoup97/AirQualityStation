<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController');

Route::get('/measurements', 'MeasurementController@index');

Route::get('/stations/{station}', 'StationController@show');
