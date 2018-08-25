<?php

namespace App\Http\Composers;

use App\Type;
use App\Author;
use App\Book;


class AuthorsComposer {

    public function authorIndexComposer($view)
    {
        $view->with('authors',Author::all());
    }
}
