<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authorFavorite extends Model
{
    protected $guarded=[];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
