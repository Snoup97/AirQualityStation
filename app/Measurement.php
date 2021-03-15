<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{

    /*
     *
     * Section: Variables
     *
     */
    protected $fillable = [
        'name',
        'temperature',
        'humidity',
        'pressure',
        'gas',
        'p25',
        'p10'
    ];


    /*
     *
     * Section: Functions
     *
     */
    /**
     * get a temperature and return a rating score
     *
     * @param $temperature
     * @return int
     */
    public function temperatureRating($temperature): int
    {
        $rating = 0;



        return $rating;
    }

}
