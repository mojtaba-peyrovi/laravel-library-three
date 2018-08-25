<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Read;
use App\Quote;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    //favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function authorFavorites()
   {
       return $this->hasMany(authorFavorite::class);
   }


     public function reads()
    {
        return $this->hasMany(Read::class);
    }
     public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
    public function authors()
   {
       return $this->hasMany(Author::class);
   }


}
