<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function(Faker $faker) {
    return [
        'idStudent' => $faker->randomNumber(5, false),
        'firstName' => utf8_encode(ucwords(strtolower($faker->firstName))),
        'lastName' => utf8_encode(mb_strtoupper($faker->lastName)),
    ];
});
