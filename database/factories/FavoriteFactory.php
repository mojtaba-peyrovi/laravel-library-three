<?php
use App\User;
use App\Book;
use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'book_id' => Book::all()->random()->id,
        'fav' => '1',
    ];
});
