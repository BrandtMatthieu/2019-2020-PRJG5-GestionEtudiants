<?php

use Faker\Generator as Faker;

$factory->define(App\Log::class, function(Faker $faker) {
    $idAction = $faker->numberBetween(0, 6);
    $value = null;

    switch($idAction) {
        case 0: // add student
        case 1: // delete student
            $value = null;
            break;
        case 2: // edit idStudent
            $value = $faker->randomNumber(5, false);
            break;
        case 3: // edit firstName
            $value = $faker->firstName();
            break;
        case 4: // edit lastName
            $value = $faker->lastName();
            break;
        case 5: // subscribe to course
        case 6: // unsubscribe from course
            $value = $faker->randomNumber(3, false);
            break;
    }

    return [
        'idLog' => $faker->randomNumber(3, false),
        'idUser' => $faker->randomNumber(3, false),
        'timestamp' => $faker->unixTime('now'),
        'idAction' => $idAction,
        'idStudent' => $faker->randomNumber(5, false),
        'value' => $value,
    ];
});
