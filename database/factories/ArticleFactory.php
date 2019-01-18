<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'description' => $faker->text,
        'tags' => implode(',', $faker->words()),
        'cover' => env('SITE_DEFAULT_IMAGE'),
    ];
});
