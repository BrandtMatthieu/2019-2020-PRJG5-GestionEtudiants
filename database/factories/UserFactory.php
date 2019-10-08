<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function(Faker $faker) {
	$joinedAt = $faker->unixTime('now');
    return [
        'idUser' => $faker->randomNumber(3, false),
        'login' => $faker->userName,
        'joinedAt' => $joinedAt,
        'password' => hash('sha256', $faker->password().$joinedAt),
        'token' => bin2hex(random_bytes(32)),
    ];
});
