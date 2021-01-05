<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ArticleData::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
    ];
});
