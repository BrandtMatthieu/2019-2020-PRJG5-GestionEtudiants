<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function(Faker $faker) {
    return [
        'idStudent' => $faker->randomNumber(5, false),
        'firstName' => ucwords(mb_strtolower($faker->firstName)),
        'lastName' => mb_strtoupper($faker->lastName),
        'deleted' => $faker->randomElement(array(true, false, false)),
    ];
});
