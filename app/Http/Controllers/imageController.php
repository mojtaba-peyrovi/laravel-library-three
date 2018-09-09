<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Publisher;
use App\Type;
use App\Read;
use App\Quote;
use App\Favorite;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Validator;
use Carbon\Carbon;
use File;

class imageController extends Controller
{
    public function createImage()
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


    }
}
