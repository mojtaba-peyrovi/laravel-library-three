<?php
use App\User;
use App\Book;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'book_id' => Book::all()->random()->id,
        'review_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'review_body' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'rate' => $faker->numberBetween(1,5),
    ];
});
