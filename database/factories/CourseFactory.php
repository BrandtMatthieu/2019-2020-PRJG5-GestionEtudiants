<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function(Faker $faker) {
    return [
        'courseLabel' => substr(strtoupper($faker->fistName), 0, 3),
        'courseDescription' => $faker->text,
    ];
});