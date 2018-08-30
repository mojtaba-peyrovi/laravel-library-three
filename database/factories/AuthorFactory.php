<?php

use App\User;
use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'name' => $faker->name,
        'last_name' => $faker->word(),
        'photo' => $faker->randomElement([
            '/img/authors/sandra-brown-2018-08-27.jpg',
            '/img/authors/shari-lapena-2018-08-26.jpg',
            '/img/authors/elena-passarello-2018-08-21.jpg',
            '/img/authors/daniel-silva-2018-08-21.jpg',
            '/img/authors/catherine-coulter-2018-08-22.jpg'
        ]),
        'email' => $faker->email(),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'birth_city' => $faker->city,
        'birth_country' => $faker->country,
        'occupation' => $faker->randomElement(['Novelist','Author','Writer']),
        'Nationality' => $faker->randomElement(['American','Iranian','Thai','British']),
        'rate' => $faker->numberBetween(1,5),
        'wiki' => $faker->url,
        'desc' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'created_at' => $faker->dateTimeBetween($startDate = '-20 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
    ];
});
