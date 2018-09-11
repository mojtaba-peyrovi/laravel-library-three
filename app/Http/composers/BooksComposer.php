<?php

namespace App\Http\Composers;

use App\Type;
use App\Author;
use App\Book;
use App\Publisher;

class BooksComposer
{
    public function bookEditComposer($view)
    {
        $view->with('types', Type::all());
        $view->with('authors', Author::all());
        $view->with('publishers', Publisher::all());
    }

    public function bookCreateComposer($view)
    {
        $view->with('types', Type::all());
        $view->with('authors', Author::all());
        $view->with('publishers', Publisher::all());
    }

    public function bookIndexComposer($view)
    {
        $view->with('types', Type::all());
        $view->with('books', Book::paginate(15));
    }
    public function bookShowComposer($view)
    {
        $view->with('types', Type::all());
        $view->with('quotes', Quote::all());
    }
}
