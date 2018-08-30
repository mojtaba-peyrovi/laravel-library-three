<?php

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '111111',
        'photo' => $faker->randomElement([
            'img/users/mojtaba-2018-08-27-379',
            'img/users/anna-2018-08-27-531.jpg',
            'img/users/ali-2018-08-29-825.jpg'
        ]),
        'icon' => $faker->randomElement([
            'img/users/mojtaba-icon-752.jpg',
            'img/users/anna-icon-602.jpg',
            'img/users/ali-icon-200.jpg'
        ]),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'facebook' => $faker->word(),
        'instagram' => $faker->word(),
        'website' => $faker->domainName(),
        'education' => $faker->randomElement(['Masters','Bachelors','Phd','Highschoo Diploma']),
        'location' => $faker->address(),
        'created_at' => $faker->dateTimeBetween($startDate = '-45 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
    ];
});
