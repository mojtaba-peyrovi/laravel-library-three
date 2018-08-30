<?php

use App\Publisher;
use Faker\Generator as Faker;

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'country' =>  $faker->country,
        'website' =>  $faker->domainName(),
        'created_at' => $faker->dateTimeBetween($startDate = '-45 days', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now'),
    ];
});
