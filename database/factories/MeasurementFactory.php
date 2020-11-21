<?php

/** @var Factory $factory */

use App\Measurement;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Measurement::class, function (Faker $faker) {
    return [
        'name' => 'testStation',
        'temperature' => random_int(0, 100),
        'humidity' => random_int(0, 100),
        'pressure' => random_int(500, 15000),
        'gas' => random_int(80, 200),
    ];
});
