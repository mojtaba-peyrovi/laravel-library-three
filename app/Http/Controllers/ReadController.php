<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Read;
use App\Book;
use Carbon\Carbon;

class ReadController extends Controller
{
    public function addRead(Request $request, Book $book)
    {
        $this->validate($request, [
            'read_date' => 'required|unique:reads',
            'book_id' => 'unique:reads'
        ]);

        $read = Read::create([
        'user_id' => auth()->user()->id,
        'book_id' => $book->id,
        'read_date' => Carbon::parse(request('read_date'))
        ]);
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Read Date Added!')->success();
        return back();
    }

    public function removeRead(Book $book, Read $read)
    {
        $read->delete();

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Read Date Removed!')->success();

        return back();
    }
}
