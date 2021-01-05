<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\TodoDescription::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
    ];
});
