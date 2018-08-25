<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Author;
use App\Type;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //books
        view()->composer('books.index',
        'App\Http\composers\BooksComposer@bookIndexComposer');

        view()->composer('books.edit',
         'App\Http\composers\BooksComposer@bookEditComposer');

        view()->composer('books.create',
        'App\Http\composers\BooksComposer@bookCreateComposer');

        //authors
        view()->composer('authors.index',
        'App\Http\composers\AuthorsComposer@authorIndexComposer');



    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
