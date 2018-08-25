<?php

namespace App;

use App\Book;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $guarded=[];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
