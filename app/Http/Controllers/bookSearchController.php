<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class bookSearchController extends Controller
{

    public function ebooks()
    {
        $books = Book::where('format','Ebook')->paginate(6);
        return view('books.index', compact('books'));
    }

    public function books()
    {
        $books = Book::where('format','Book')->paginate(6);
        return view('books.index', compact('books'));
    }

    public function audio()
    {
        $books = Book::where('format','Audio')->paginate(6);
        return view('books.index', compact('books'));
    }
}
