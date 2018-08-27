@extends('layouts.master')
@section('styles')
    <style media="screen">
    .book-img {
        border-radius: 6px 20px 20px 6px;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
        position: relative;
        -webkit-box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
        -moz-box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
        box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
    }
    .edit-right,
    .edit-left {
        border-radius: 6px;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
    }
    .edit-title{
        font-family: 'Lobster', cursive;
        font-size: 35px;
    }
    .section-title{
        font-size: 15px;
        text-align: center;
        font-family: 'Arial',serif;
        background:rgb(179, 179, 179);
        margin-top: 30px;
        color: white;
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
    }
    .edit-left{
        max-height: 550px;
    }

    </style>
@endsection
@section('title')
    Edit book
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container mt-4">
        <form class="" action="{{ action('booksController@update', $id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                 <div class="row">
                     <div class="col-md-3 offse-md-1 edit-left bg-grey-lighter p-4 d-flex justify-content-center flex-column">
                        <img src="/{{ $book->photo }}" class="book-img" id="book-img">
                        <div class="form-group" style="margin-top:-30px;">

                            <div class="mt-5">
                                <div class="section-title">Change Photo</div>
                                <hr>
                            </div>

                          <input type="file" class="form-control" id="image" name="image">
                          <p class="help-block text-right text-muted">Best Fit: 260x346(px)</p>
                        </div>
                     </div>
                     <div class="col-md-9 edit-right bg-grey-lighter p-4">
                         <div class="mb-3 edit-title text-center">
                             Edit the Book
                         </div>
                         <div class="mt-5">
                            <span class="section-title">Basic Information</span>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="title">Title: </label>
                              <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="author">Type: </label>
                              <select class="custom-select" name="type">
                                  {{-- <option selected value="{{ $book->type->id }}">{{ $book->type->title }}</option> --}}
                                      @foreach ($types as $type)
                                          <option value="{{ $type->id }}"{{ $type->id === $book->type->id ? 'selected':'' }} >{{ $type->title }}</option>
                                      @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                               <label for="author">Author: </label>
                               <select class="custom-select" name="author">
                                   @foreach ($authors as $author)
                                       <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                               <label for="author">Format: </label>
                               <select class="custom-select" name="format">
                                   <option value="Ebook" {{ $book->format == 'Ebook'?'selected':''}}>Ebook</option>
                                   <option value="Book" {{ $book->format === 'Book'?'selected' : ''}}>Physical Book</option>
                                   <option value="Audio" {{ $book->format === 'Audio'?'selected':''}}>Audio Book</option>
                               </select>
                            </div>
                        </div>
                        <div class="mt-5">
                           <span class="section-title">Publication</span>
                           <hr>
                       </div>
                       <div class="row">
                           <div class="form-group col-md-6">
                              <label for="author">Publisher: </label>
                              <select class="custom-select" name="publisher">
                                  @foreach ($publishers as $publisher)
                                      <option value="{{ $publisher['id']}}" {{ $publisher['id'] === $book->$publisher['id'] ?'selected':''}}>
                                          {{ $publisher->name }}
                                      </option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="year">Publish Year: </label>
                               <input type="text" class="form-control" name="publish_year" value="{{ $book->publish_year }}">
                           </div>
                       </div>
                       <div class="mt-5">
                          <span class="section-title">About the book</span>
                          <hr>
                      </div>
                      <div class="form-group">
                        <label for="desc">About this book: </label>
                        <textarea name="desc" class="form-control" rows="10" id="mytextarea">{{ $book->desc }}</textarea>
                      </div>
                      <div class="mt-5">
                          <hr>
                      </div>
                      <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                    </div>
                </div>
        </form>
    </div>


    </div>
@endsection
@section('script')
    <script type="text/javascript">
    // $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#book-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
        readURL(this);
        });
    // });
    </script>

@endsection
