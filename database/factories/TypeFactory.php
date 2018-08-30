<?php

use Faker\Generator as Faker;

$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomElement([
            'Fiction',
            'Art',
            'Non-fiction',
            'Thriller',
            'Horror',
            'Novel',
            'Cooking',
            'Science-fiction',
            'Mystery',
            'Literature',
            'Nutrition',
            'Adult-fiction',
            'Fantasy',
            'Humor',
            'Science'
        ]),
        'color' => $faker->randomElement([
            'green',
            'red',
            'blue',
            'yellow',
            'pink',
            'purple',
            'deep-purple',
            'indigo',
            'light-blue',
            'cyan',
            'teal',
            'green',
            'light-green',
            'lime',
            'amber',
            'orange',
            'deep-orange',
            'brown',
            'grey',
            'blue-grey'
        ]),

    ];
});
