<?php

use Faker\Generator as Faker;

$factory->define(App\Banner::class, function (Faker $faker) {
    return [
        'cover' => env('SITE_DEFAULT_IMAGE'),
        'weight' => $faker->randomDigit,
        'status' => 1,
    ];
});
