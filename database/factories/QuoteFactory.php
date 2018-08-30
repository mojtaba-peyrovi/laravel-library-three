<?php

use App\User;
use App\Book;
use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'book_id' => Book::all()->random()->id,
        'quote' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'footer' => $faker->word(),
        'cite' => $faker->word(),
        'created_at' => $faker->dateTimeBetween($startDate = '-45 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
    ];
});
