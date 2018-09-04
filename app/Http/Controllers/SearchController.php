<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function filter(request $request, Book $book)
    {
        if ($request->has('name')) {
            // if ($request->has('year')) {
            //     if ($request->has('author')) {
            //         return $book->where('name', $request->input('name'))
            //                     ->where('year', $request->input('year'))
            //                     ->where('author', $request->input('author'))->get();
            //
            //     }
            // }
            dd($book->where('name', $request->input('name')));

        }

        return view('books.index',compact('book'));
    }
}
