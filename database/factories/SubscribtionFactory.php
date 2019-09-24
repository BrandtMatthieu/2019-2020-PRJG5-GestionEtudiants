<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function(Faker $faker) {
    return [
        'idStudent' => $faker->randomNumber(5, false),
        'idCourse' => $faker->randomNumber(3, false),
    ];
});