<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{

    protected $fillable = [
        'name',
        'temperature',
        'humidity',
        'pressure',
        'gas'
    ];

}
