<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // App\User::truncate();
        App\Author::truncate();
        App\authorFavorite::truncate();
        App\Book::truncate();
        App\Favorite::truncate();
        App\Publisher::truncate();
        App\Quote::truncate();
        App\Read::truncate();
        App\Review::truncate();
        App\Type::truncate();

        // $userQuantity = 20;
        $authorQuantity = 20;
        $authorFavoriteQuantity = 50;
        $bookQuantity = 20;
        $favoriteQuantity = 200;
        $publisherQuantity = 5;
        $readQuantity = 150;
        $reviewQuantity = 5000;
        $typeQuantity = 15;
        $quoteQuantity = 200;

        // factory(App\User::class, $userQuantity)->create();
        factory(App\Type::class, $typeQuantity)->create();
        factory(App\Author::class, $authorQuantity)->create();
        factory(App\Publisher::class, $publisherQuantity)->create();
        factory(App\Book::class, $bookQuantity)->create();
        factory(App\authorFavorite::class, $authorFavoriteQuantity)->create();
        factory(App\Favorite::class, $favoriteQuantity)->create();
        factory(App\Read::class, $readQuantity)->create();
        factory(App\Review::class, $reviewQuantity)->create();
        factory(App\Quote::class, $quoteQuantity)->create();







    }
}
