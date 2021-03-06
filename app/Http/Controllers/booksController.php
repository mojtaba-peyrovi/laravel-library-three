<?php

namespace App\Http\Controllers;

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
use App\Http\Controllers\imageController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use DB;
use Validator;
use Carbon\Carbon;
use File;

class booksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $books = Book::paginate(15);
        $book_stars = $book->calculate_stars();

        return view('books.index', compact('books','int','decimal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::with('author')->get();

        return view('books.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {

        // $rules = [
        //     'publish_year' => 'required',
        //     'read_date' => 'required',
        //     'title' => 'required|min:5',
        //     'photo' => 'Rule::dimension()->maxwidth(1000)'
        // ];
        //
        // $this->validate($request, $rules);

       $book->createBook($request, $book);


        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Book Added!')->success();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        $related_books = Book::where('type_id', $book->type_id)
                            ->where('id', '!=', $book->id)->get();
        $favorites_exist = Favorite::where('book_id','=',$book->id)->
                                     where('user_id','=',auth()->user()['id'])->first();

        $book_rate = $book->rate;
        $book_stars = $book->calculate_stars();
        $int = floor($book_stars);
        $decimal = $book_stars - $int;

        //popularity
        $popularity = round(($book_stars / 5) * 100);
        // stars percentages
        $five = $book->five_star_percent();
        $four = $book->four_star_percent();
        $three = $book->three_star_percent();
        $two = $book->two_star_percent();
        $one = $book->one_star_percent();
        // dd($book_reviews );

        $quotes = Quote::all();
        return view('books.show', compact('book','related_books','$book_rate','favorites_exist','quotes','int','decimal','five','four','three','two','one','popularity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $book = Book::find($id);
        $publishers = Publisher::all();
        $read = Read::where('book_id','=',$id)->get();
        $last_read = $read->last()['read_date'];

         return view('books.edit',compact('book','id','last_read','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = Book::find($id);

        $book->updateBook($request, $book);

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        return redirect()->route('books.show',[$book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/books');
    }

    public function uploadBulk(Request $request)
    {
        // Validatior
        $validator = Validator::make($request->all(), [
            'upload-file' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('books/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //method 1

        // //get file
        //     $upload = $request->file('upload-file');
        //     $filePath = $upload->getRealPath();
        // //open and read
        //     $file = fopen($filePath,'r'); // r means READ
        //     $header = fgetcsv($file); // reads the file
        // // dd($header);
        // $escapedHeader = [];
        //
        // //validate
        //     foreach ($header as $key => $value) {
        //         $lowerCasedHeader = strtolower($value);
        //         $escapedItem = preg_replace('/[[^a-z]]/','',$lowerCasedHeader);  // it removes any special characters from the headers exceptp a-z letters
        //         array_push($escapedHeader,$escapedItem);
        //     }
        //     //looping through columns
        //     while($columns=fgetcsv($file)) {
        //         if($columns[0]==""){
        //             continue;
        //         }
        //         //trim data
        //         foreach ($columns as $key => &$value) {
        //             $value = preg_replace('/\D/','',$value);
        //         }
        //         //dd($value);
        //         $data = array_combine($escapedHeader, $columns);
        //         dd($data);

                // //setting data type
                // foreach ($data as $key => &$value) {
                //     $value =($key=="id" || $key =="author_id")?(integer)$value: (float)$value;
                // }

            //     //table update
            //     $id = $data['id'];
            //     $author_id = $data['author_id'];
            //     $publisher_id = $data['publisher_id'];
            //     $type_id = $data['type_id'];
            //     $publish_year = $data['publish_year'];
            //     $title = $data['title'];
            //     $photo = $data['photo'];
            //     $format = $data['format'];
            //     $desc = $data['desc'];
            //     $created_at = $data['created_at'];
            //     $updated_at = $data['updated_at'];
            //
            //     $book = Book::firstOrNew(['id'=> $id]);
            //     $book->author_id = $author_id;
            //     $book->publisher_id = $publisher_id;
            //     $book->type_id = $type_id;
            //     $book->publish_year = $publish_year;
            //     $book->title = $title;
            //     $book->photo = $photo;
            //     $book->format = $format;
            //     $book->desc = $desc;
            //     $book->created_at = $created_at;
            //     $book->updated_at = $updated_at;
            //     $book->save();
            // }

        ///// method 2
        $file = $request->file('upload-file');
        $csvData = file_get_contents($file);

        $rows = array_map('str_getcsv', explode("\n", $csvData));

        $header = array_shift($rows);  // removes the header
        $rows_new = array_slice($rows, 0, sizeof($rows)-1);
        // dd($rows_new);
        foreach ($rows_new as $row){
            $row = array_combine($header, $row);

            Book::create([
                'author_id' => $row['author_id'],
                'publisher_id' => $row['publisher_id'],
                'type_id' => $row['type_id'],
                'publish_year' => $row['publish_year'],
                'title' => $row['title'],
                'photo' => $row['photo'],
                'format' => $row['format'],
                'desc' => $row['desc'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at']
            ]);
        }
        flash('Books are imported');

        return redirect('/books');

        }

        public function getFavorite($book)
        {

            $book_check = Favorite::where('book_id','=',$book)
                                    ->where('user_id','=',auth()->user()->id)->first();
                if (! $book_check == null) {
                    flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Already Favorited!')->success();
                    return back();
                }else{
                    Favorite::create([
                    'user_id' => Auth::user()->id,
                    'book_id' => $book,
                    'fav' => 1
                    ]);
                    flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Favorited!')->success();
                    return back();
                }


        }
        public function getUnFavorite($book)
        {

            $book_check = Favorite::where('book_id','=',$book)
                                   ->where('user_id','=',auth()->user()->id)->first();

            if (! $book_check == null) {
                $fav = Favorite::find($book_check['id']);
                $fav->delete();
                flash('<i class="fa fa-comment-o" aria-hidden="true"></i>Unfavorited!')->success();
                return back();
            }else{

                return back();
            }
        }



    }
