<?php

use App\Read;
use App\User;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Read::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'book_id' => Book::all()->random()->id,
        'read_date' => $faker->dateTimeBetween($startDate = '-50 days', $endDate = 'now'),
    ];
});
