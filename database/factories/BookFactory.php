<?php

use Faker\Generator as Faker;
use App\Book;
use App\User;
use App\Author;
use App\Publisher;
use App\Type;


$factory->define(Book::class, function (Faker $faker) {


    return [
        'user_id' =>  User::all()->random()->id,
        'author_id' =>  Author::all()->random()->id,
        'publisher_id' =>  Publisher::all()->random()->id,
        'type_id' =>  Type::all()->random()->id,
        'publish_year' => $faker->year($max = 'now'),
        'read_date' => $faker->dateTimeBetween($startDate = '-90 days', $endDate = 'now'),
        'title' => $faker->word(),
        'photo' => $faker->randomElement([
            'img/books/paradox-2018-08-22.jpg',
            'img/books/tailspin-2018-08-27.jpg',
            'img/books/the-english-assassin-2018-08-21.jpg'
        ]),
        'format' => $faker->randomElement(['Ebook','Book','Audio']),
        'rate' => $faker->numberBetween(1,5),
        'desc' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'created_at' => $faker->dateTimeBetween($startDate = '-20 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),

    ];
});
