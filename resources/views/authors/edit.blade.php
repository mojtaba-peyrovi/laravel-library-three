@extends('layouts.master')
@section('title')
    Edit Author
@endsection
@section('content')

    @section('stylesheets')
        <link rel="stylesheet" href="/css/bootstrap-imageupload.css">
    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item active">{{ $author->fullName() }}</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Edit the Author</h2>
            <hr>
            <form class="" action="{{ action('AuthorsController@update', $id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">First Name: </label>
                          <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="last_name">Last Name: </label>
                          <input type="text" class="form-control" name="last_name" value="{{ $author->last_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="birthday">Birthday: </label>
                          <input type="text" class="form-control" name="birthday" value="{{ $author->birthday }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="birthday_place">Birth Place: </label>
                          <input type="text" class="form-control" name="birthday_place" value="{{ $author->birthday_place }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="occupation">Occupation: </label>
                          <input type="text" class="form-control" name="occupation" value="{{ $author->occupation }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="nationality">Nationality: </label>
                          <input type="text" class="form-control" name="nationality" value="{{ $author->nationality }}">
                        </div>
                    </div>
                </div>




                <div class="form-group">
                  <label for="photo">Photo Link: </label>
                  <input type="text" class="form-control" name="photo" value="{{ $author->photo }}">
                  <img src="{{ $author->photo }}" alt="" class="mt-2" width="130px;">
                </div>
                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control">{{ $author->desc }}</textarea>
                </div>

                <button type="submit" name="button" class="btn btn-orange btn-sm">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Submit
                </button>
                <form class="" action="/authors/{{ $author->id }}" method="get">
                    <button type="submit" name="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        CANCEL
                    </button>
                </form>
            </form>
        </div>


    </div>
    

@endsection

@section('scripts')
    <script>
        $( function() {
           $( "#datepicker" ).datepicker();
        });
     </script>
@endsection
