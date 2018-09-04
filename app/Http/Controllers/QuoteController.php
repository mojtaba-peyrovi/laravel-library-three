<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Book;
class QuoteController extends Controller
{
    public function addQuote(Request $request, Book $book)
    {
        $this->validate($request,[
            'quote' => 'required'
        ]);

        $quote  = Quote::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'quote' => $request->input('quote'),
            'footer' => $request->input('footer'),
            'cite' => $request->input('cite')
        ]);
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Quote Added!')->success();

        return back();
    }

    public function removeQuote(Book $book, Quote $quote)
    {
        $quote->delete();

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Quote Removed!')->success();

        return back();
    }
}
