<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function(Faker $faker) {
    return [
        'idCourse' => $faker->randomNumber(3, false),
        'courseLabel' => utf8_encode(substr(mb_strtoupper($faker->firstName), 0, 3)),
        'courseDescription' => utf8_encode($faker->text),
    ];
});
