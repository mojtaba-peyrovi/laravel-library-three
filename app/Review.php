<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
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
