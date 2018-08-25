@extends('layouts.master')
@section('title')
    Edit your book
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <h2>Edit your Book:

            </h2>
            <hr>
            <form action="{{ action('booksController@update', $id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                  <label for="title">Title: </label>
                  <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="author">Type: </label>
                      <select class="custom-select" name="type">
                          {{-- <option selected value="{{ $book->type->id }}">{{ $book->type->title }}</option> --}}
                              @foreach ($types as $type)
                                  <option value="{{ $type->id }}"{{ $type->id === $book->type->id ? 'selected':'' }} >{{ $type->title }}</option>
                              @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="publish_year">Publish Year: </label>
                      <input type="text" class="form-control" name="publish_year" value="{{ $book->publish_year }}">

                    </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                      <label for="author">Author: </label>
                      <select class="custom-select" name="author">
                          @foreach ($authors as $author)
                              <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
                          @endforeach
                      </select>
                   </div>
                 </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="read_date">Last Read Date: </label>
                        <input type="text" class="form-control" name="read_date" id="datepicker" value="{{ $last_read }}">
                      </div>
                  </div>                 
                </div>
                    

                <div class="form-group">
                  <label for="photo">Photo Link: </label>
                  <input type="text" class="form-control" name="photo" value="{{ $book->photo }}">
                  <img src="{{ $book->photo }}" alt="" class="img-thumbnail mt-3" style="width:150px;">
                </div>

                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control">{{ $book->desc }}</textarea>
                </div>
                
                <button type="submit" name="button" class="btn btn-orange btn-sm">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Submit
                </button>
                <form class="" action="/books/{{ $book->id }}" method="get">
                    <button type="" name="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        CANCEL
                    </button>
                </form>
            </form>

        </div>








    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $( function() {
           $( "#datepicker" ).datepicker({
                dateFormat: 'yyyy-mm-dd',

            });
        });
    </script>
@endsection
