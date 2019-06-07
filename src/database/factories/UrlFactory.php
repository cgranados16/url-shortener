<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\URL;
use Faker\Generator as Faker;

$factory->define(URL::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'code' => substr($faker->md5, 0, 6)
    ];
});
