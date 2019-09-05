<?php

use Faker\Generator as Faker;
use App\Author;
use Illuminate\Support\Facades\Hash;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email,
//        'password' => app('hash')->make('secret'),
        'password' => Hash::make('secret'),
        'github' => $faker->url,
        'twitter' => $faker->url,
        'location' => $faker->streetAddress
    ];
});
