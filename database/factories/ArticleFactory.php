<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
//    $author_ids = DB::table('authors')->select('id')->get();
//    $author_id = $faker->randomElement($author_ids)->id;

    return [
        'main_title' => $faker->sentence($nbWords = 3),
        'secondary_title' => $faker->sentence($nbWords = 3),
        'content' => $faker->sentence(),
        'img' => $faker->image,
//        'author_id' => $faker->numberBetween($min = 1, $max = 5)
        'author_id' => App\Author::all()->random()->id
//        'author_id' => $author_id
    ];
});
