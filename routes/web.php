<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/books', 'booksController@index')->name('books-index');
// Route::get('/books/{book}', 'booksController@show')->name('books-show');
// Route::get('/books/{book}/edit', 'booksController@edit')->name('books-edit');
// Route::get('/book/create', 'booksController@create');
// Route::post('/books', 'booksController@store');
// Route::put('/books/{book}', 'booksController@update');
Route::resource('books', 'booksController');
Route::Post('books/create/bulk', 'booksController@uploadBulk');
Route::resource('authors', 'AuthorsController');

//book search
Route::get('/ebooks', 'bookSearchController@ebooks');
Route::get('/physical-books', 'bookSearchController@books');
Route::get('/audio-books', 'bookSearchController@audio');

//book favorite
Route::post('/books/{book}/favorited','booksController@getFavorite')->name('book-favorite');
Route::post('/books/{book}/unfavorited','booksController@getUnFavorite')->name('book-unfavorite');
//author favorite
Route::post('/authors/{author}/favorited','AuthorsController@getFavorite')->name('author-favorite');
Route::post('/authors/{author}/unfavorited','AuthorsController@getUnFavorite')->name('author-unfavorite');
Route::get('/home', 'HomeController@index')->name('home');

//add read date
Route::post('/books/{book}/add-read', 'ReadController@addRead')->name('add-read');
//remove read date
Route::delete('/books/{book}/reads/{read}/remove','ReadController@removeRead')->name('remove-read');
//add quote
Route::post('/books/{book}/add-quote', 'QuoteController@addQuote')->name('add-quote');
//remove quotes
Route::delete('/books/{book}/quotes/{quote}/remove','QuoteController@removeQuote')->name('remove-quote');
// add a review
Route::post('/books/{book}/add-review', 'reviewController@addReview')->name('add-review');

// show reviews of a books
Route::get('/books/{book}/reviews','reviewController@allBookReviews')->name('all-reviews');

// set profile image
Route::patch('/users/{user}/edit','usersController@update');


Route::resource('types', 'TypeController');


Route::resource('/publishers', 'PublisherController');

//show user's favorites
Route::get('/users/{user}/favorites','FavoriteController@myFavorites');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('users', 'usersController');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/test', function(){
    return view('test');
});
