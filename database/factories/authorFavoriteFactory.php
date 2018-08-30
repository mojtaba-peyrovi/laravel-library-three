<?php

use App\User;
use App\Author;
use App\authorFavorite;
use Faker\Generator as Faker;

$factory->define(authorFavorite::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'author_id' => Author::all()->random()->id,
        'fav' => '1'
    ];
});
