<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function(Faker $faker) {
    return [
        'courseLabel' => substr(strtoupper($faker->firstName), 0, 3),
        'courseDescription' => $faker->text,
    ];
});