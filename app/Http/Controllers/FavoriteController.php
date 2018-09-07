<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Favorite;
use App\User;

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

    public function myFavorites(User $user)
    {
        $favorites = Auth()->user()->favorites()->paginate(10);
        
        return view('books.index', compact('favorites'));
    }
}
