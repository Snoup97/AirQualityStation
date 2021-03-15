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
     * @return int
     */
    public function createRating()
    {
        $results['temperature'] = 0;
        $results['humidity'] = 0;
        $results['gas'] = 0;
        $results['p'] = 0;

        if ($this->temperature != null) {
            if($this->temperature >= 18.0 && $this->temperature <= 25.0){
                $results['temperature'] = 1;
            } else if($this->temperature >= 15.0 && $this->temperature <= 28.0){
                $results['temperature'] = 2;
            } else {
                $results['temperature'] = 3;
            }
        }

        if ($this->humidity != null) {
            if($this->humidity >= 40.0 && $this->humidity <= 60.0){
                $results['humidity'] = 1;
            } else if($this->humidity >= 25.0 && $this->humidity <= 75.0){
                $results['humidity'] = 2;
            } else {
                $results['humidity'] = 3;
            }
        }

        if ($this->gas != null) {
            if($this->gas <= 150.0){
                $results['gas'] = 1;
            } else if($this->gas >= 150.0 && $this->gas <= 300.0){
                $results['gas'] = 2;
            } else {
                $results['gas'] = 3;
            }
        }

        if ($this->p25 != null && $this->p10 != null) {
            $pReading = ($this->p25 + $this->p10) / 2;
            if($pReading <= 60.0){
                $results['p'] = 1;
            } else if($pReading > 60.0 && $pReading <= 200.0){
                $results['p'] = 2;
            } else {
                $results['p'] = 3;
            }
        }

        if (in_array(2, $results)){
            return 2;
        } else if (in_array(3, $results)){
            return 3;
        } else {
            return 1;
        }
    }

}
