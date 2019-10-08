<?php

use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function(Faker $faker) {
    return [
        'idStudent' => $faker->randomNumber(5, false),
        'idCourse' => $faker->randomNumber(3, false),
    ];
});
