<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Read;
use App\Quote;
use App\Review;

class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return 'books/'. $this->id;
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
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

    public function read_last_month()
    {
        $now = Carbon::now();
        $days_ago = $now->diffInDays($this->read_date);
        if ($days_ago <= 30) {
            return True;
        }else {
            return False;
        }
    }

     public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reads()
    {
        return $this->hasMany(Read::class);
    }
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function calculate_stars()
    {
        $avg = $this->reviews()->avg('rate');
        $reviews_avg = round($avg,1);
        return $reviews_avg;
    }

    public function five_star_percent()
    {
        $all_reviews = $this->reviews()->count('rate');
        $five_reviews = $this->reviews()->where('rate','5')->count('rate');

        if ($all_reviews == 0) {
            $five_percentage = round(($five_reviews)* 100, 1);
        }else {
            $five_percentage = round(($five_reviews / $all_reviews)* 100, 1);
        }

        return $five_percentage;
    }
    public function four_star_percent()
    {
        $all_reviews = $this->reviews()->count('rate');
        $four_reviews = $this->reviews()->where('rate','4')->count('rate');

        if ($all_reviews == 0) {
            $four_percentage = round(($four_reviews)* 100, 1);
        } else {
            $four_percentage = round(($four_reviews / $all_reviews)* 100, 1);
        }

        return $four_percentage;
    }
    public function three_star_percent()
    {
        $all_reviews = $this->reviews()->count('rate');
        $three_reviews = $this->reviews()->where('rate','3')->count('rate');
        if ($all_reviews == 0) {
            $three_percentage = round(($three_reviews)* 100, 1);
        } else {
            $three_percentage = round(($three_reviews / $all_reviews)* 100, 1);
        }

        return $three_percentage;
    }
    public function two_star_percent()
    {
        $all_reviews = $this->reviews()->count('rate');
        $two_reviews = $this->reviews()->where('rate','2')->count('rate');
        if ($all_reviews == 0) {
            $two_percentage = round(($two_reviews)* 100, 1);
        } else {
            $two_percentage = round(($two_reviews / $all_reviews)* 100, 1);
        }

        return $two_percentage;
    }
    public function one_star_percent()
    {
        $all_reviews = $this->reviews()->count('rate');
        $one_reviews = $this->reviews()->where('rate','1')->count('rate');
        if ($all_reviews == 0) {
            $one_percentage = round(($one_reviews)* 100, 1);
        } else {
            $one_percentage = round(($one_reviews / $all_reviews)* 100, 1);
        }
        return $one_percentage;
    }



}
