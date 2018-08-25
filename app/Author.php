<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use authorFavorite;
class Author extends Model
{
    protected $guarded = [];

    public function path()
    {
        $path = 'authors/'. $this->id;
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function fullName()
    {
        $name = $this->name;
        $lastname = $this->last_name;
        return $name .' '. $lastname;
    }

    public function getAge()
    {
        $start_time = Carbon::parse($this->birthday);
        $age = Carbon::now()->diffInYears($start_time);
        return $age;
    }
    public function is_new()
    {
        $now = Carbon::now();
        $days_ago = $now->diffInDays($this->created_at);
        if ($days_ago <= 7) {
            return True;
        }else {
            return False;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function authorFavorites()
    {
        return $this->hasMany(authorFavorite::class);
    }


}
