<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\URL;
use Faker\Generator as Faker;
use Tuupola\Base62;

$factory->define(URL::class, function (Faker $faker) {
    $base62 = new Base62();
    return [
        'url' => $faker->url,
        'code' => '',
    ];
});
