<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Favorite;
use App\Author;
use Auth;
use Carbon\Carbon;
use App\authorFavorite;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $books = Book::all();
        $authorFavorites = Author::all();
        $has_favorite_book = Favorite::where('user_id','=',auth()->user()->id)->first();
        $has_favorite_author = authorFavorite::where('user_id','=',auth()->user()->id)->first();
        // dd($has_favorite_author);
        return view('users.show', compact('user','books','authorFavorites','has_favorite_book','has_favorite_author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
           //profile photo
           $image = $request->file('image');
           $title = Auth::user()->name;
           $slug = str_slug($title ,'-');
           $filename = $slug . '-' . Carbon::now()->toDateString() . '.jpg';
           $image_resize = Image::make($image->getRealPath());
           $image_resize->fit(260, 346);
           $image_resize->save(public_path('img/users/' .$filename));

           //icon
           $icon = $request->file('image');
           $iconTtitle = Auth::user()->name;
           $iconFilename = $slug . '-' . 'icon' . '.jpg';
           $icon_resize = Image::make($image->getRealPath());
           $icon_resize->fit(100, 100, function ($constraint) {
                        $constraint->upsize();
                    });
           $icon_resize->save(public_path('img/users/' . $iconFilename));
       }

       // update form
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        if ( ! $request->get('password') == '')
        {
            $user->password = bcrypt($request->get('password'));
        }

        $user->photo = $request->get('photo');
        $user->facebook= $request->get('facebook');
        $user->instagram = $request->get('instagram');
        $user->website = $request->get('website');
        $user->education = $request->get('education');
        if ( ! $request->get('image') == '')
        {


        }
        $user->icon = '/img/users/' . $iconFilename;
        $user->photo = 'img/users/' . $filename;
        $user->save();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        return redirect()->route('users.show',[$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setImage(Request $request)
    {


        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();
        return back();
    }

}
