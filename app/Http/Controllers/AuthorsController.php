<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Book;
use App\authorFavorite;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $book_stars = $book->calculate_stars();
        return view('authors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Image $image)
    {
         //image upload
        if(Input::hasFile('image'))
        {
            $image = $request->file('image');
            $title = $request->input('name').'-' .$request->input('last_name');
            $slug = str_slug($title ,'-');
            $filename = $slug . '-' . Carbon::now()->toDateString() . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(260, 346);
            $image_resize->save(public_path('img/authors/' .$filename));
        };

        $author = Author::create([
            'user_id' => Auth::user()->id,
            'name' => ucfirst(request('name')),
            'last_name' => ucfirst(request('last_name')),
            'birthday' => Carbon::parse(request('birthday')),
            'birth_city' => request('birth_city'),
            'birth_country' => request('birth_country'),
            'nationality' => request('nationality'),
            'photo' => '/img/authors/'. $filename,
            'occupation' => request('occupation'),
            'rate' => request('rate'),
            'wiki' => request('wiki'),
            'desc' => request('desc')
        ]);

        authorFavorite::create([
            'user_id' => Auth::user()->id,
            'author_id' => $author->id,
            'fav' => 1
        ]);




        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Author Added!')->success();
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $related_books = $author->books;
        $favorites_exist = authorFavorite::where('author_id','=',$author->id)->
                                     where('user_id','=',auth()->user()['id'])->first();

        return view('authors.show', compact('author','related_books','favorites_exist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
         return view('authors.edit',compact('author','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->user_id = Auth::user()->id;
        $author->name = $request->get('name');
        $author->last_name = $request->get('last_name');
        $author->birthday = Carbon::parse(request('birthday'));
        $author->birthday_place = $request->get('birthday_place');
        $author->occupation = $request->get('occupation');
        $author->nationality = $request->get('nationality');
        $author->photo = $request->get('photo');
        $author->desc = $request->get('desc');
        $author->save();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        // return view('authors.show', ['author' => Author::find($id), 'related_books'=> $author->books]);
        return redirect()->route('authors.show',[$author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/authors');
    }

    public function getFavorite($author)
    {

        $author_check = authorFavorite::where('author_id','=',$author)
                                ->where('user_id','=',auth()->user()->id)->first();
            if (! $author_check == null) {
                flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Already Favorited!')->success();
                return back();
            }else{
                authorFavorite::create([
                'user_id' => Auth::user()->id,
                'author_id' => $author,
                'fav' => 1
                ]);
                flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Favorited!')->success();
                return back();
            }


    }
    public function getUnFavorite($author)
    {

            $author_check = authorFavorite::where('author_id','=',$author)
                                   ->where('user_id','=',auth()->user()->id)->first();
            // dd($book_check['id']);

            if (! $author_check == null) {
                $fav = authorFavorite::find($author_check['id']);
                $fav->delete();
                flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Unfavorited!')->success();
                return back();
            }else{

                return back();
            }

    }


}
