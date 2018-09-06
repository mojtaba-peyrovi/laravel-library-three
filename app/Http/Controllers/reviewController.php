<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Book;
class reviewController extends Controller
{
    public function addReview(Request $request, Book $book){
        $this->validate($request,[
            'review_title' => 'required',
            'review_body' => 'required'
        ]);

        $quote  = Review::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'review_title' => $request->input('review_title'),
            'review_body' => $request->input('review_body'),
            'rate' => $request->input('rate'),

        ]);
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Quote Added!')->success();

        return back();
    }

    public function index(Book $book)
    {
         $review_counts = $book->reviews()->count();
        $reviews = $book->reviews()->paginate(15);
        return view('reviews.index', compact('reviews','review_counts','book'));
    }

}
