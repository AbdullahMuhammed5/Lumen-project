<?php

use Faker\Generator as Faker;
use App\Author;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2),
        'email' => $faker->email,
        'github' => $faker->url(),
        'twitter' => $faker->url(),
        'location' => $faker->streetAddress()
    ];
});
