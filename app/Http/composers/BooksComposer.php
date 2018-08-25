<?php

namespace App\Http\Composers;

use App\Type;
use App\Author;
use App\Book;

class BooksComposer
{
    public function bookEditComposer($view)
    {
        $view->with('types',Type::all());
        $view->with('authors',Author::all());
    }
    public function bookCreateComposer($view)
    {
        $view->with('types',Type::all());
        $view->with('authors',Author::all());
    }

    public function bookIndexComposer($view)
    {

        // $view->with('books', Book::all());
        // $view->with('books',Book::where('format', 'Ebook')->get());
    }
}
