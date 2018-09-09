<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Read;
use App\Quote;
use App\Review;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use File;

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

    public function createBook(Request $request)
    {
        //image upload
       if(Input::hasFile('image'))
       {
           $image = $request->file('image');
           $title = $request->input('title');
           $slug = str_slug($title ,'-');
           $filename = $slug . '-' . Carbon::now()->toDateString() . '.jpg';
           $image_resize = Image::make($image->getRealPath());
           $image_resize->fit(260, 346);
           $image_resize->save(public_path('storage/img/books/' . $filename));
       };



       $book = Book::create([
           'title' => ucwords(request('title')),
           'user_id' => Auth::user()->id,
           'author_id' => $request->input('author'),
           'type_id' => $request->input('type'),
           'publisher_id' => 1,
           'read_date' => Carbon::parse(request('read_date')),
           'publish_year' => request('publish_year'),
           'photo' => $filename,
           'format' => request('format'),
           'rate'=> request('rate'),
           'desc' => request('desc')
       ]);
    }


    public function updateBook(Request $request,Book $book)
    {
        if ($request->hasFile('image')) {
            $bookImage = public_path("{$book->photo}");
            if (File::exists($bookImage)) { // unlink or remove previous image from folder
            @unlink($bookImage);
            }

           //save photo
           $image = $request->file('image');
           $title = $book->title;
           $slug = str_slug($title ,'-');
           $filename = $slug . '-' . Carbon::now()->toDateString() . '-' . rand(1,1000) . '.jpg';
           $image_resize = Image::make($image->getRealPath());
           $image_resize->fit(260, 346);
           $image_resize->save(public_path('storage/img/books/' . $filename));

           // update form
            $book->user_id = Auth::user()->id;
            $book->author_id = $book->author['id'];
            $book->publisher_id = $book->publisher['id'];
            $book->type_id = $book->type['id'];
            $book->publish_year = $request->get('publish_year');
            $book->title = $request->get('title');
            $book->photo = $filename;
            $book->format = $request->get('format');
            $book->desc = $request->get('desc');
            $book->save();
            } else {

           // update form
           $fields = ['user_id','author_id','publisher_id','type_id','publish_year','title','format','desc'];
           $inputs = $request->only($fields);
           Book::where('id', $book->id)->update($request->only($fields));
            }
    }

}
