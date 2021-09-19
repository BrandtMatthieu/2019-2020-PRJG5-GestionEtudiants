<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function(Faker $faker) {
    return [
        'idCourse' => $faker->randomNumber(3, false), // TODO
        'courseLabel' => strtoupper($faker->lexify('???')),
        'courseDescription' => $faker->realText($faker->numberBetween(40,50)),
    ];
});
