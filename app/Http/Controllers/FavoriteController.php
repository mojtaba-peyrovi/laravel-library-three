<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Favorite;

class FavoriteController extends Controller
{
    public function getFavorite($book)
    {	
    	
    	Favorite::create([
            'user_id' => Auth::user()->id,
            'book_id' => $book,
            'fav' => 1
        ]);

        return back();
    }
}
