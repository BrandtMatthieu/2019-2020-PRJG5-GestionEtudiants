<?php

use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function(Faker $faker) {
    return [
        'idStudent' => $faker->numberBetween($min = 1, $max = 50),
        'idCourse' => $faker->numberBetween($min = 1, $max = 15),
    ];
});
