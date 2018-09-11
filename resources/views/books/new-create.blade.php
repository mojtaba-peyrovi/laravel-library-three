@extends('layouts.master')
@section('title')
    Add a Book
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        {{-- @include('flash::message') --}}
        @include('front.partials.errors')
        <div class="col-md-8 offset-md-2">
            <h2>Create a Book</h2>
            <hr>
            <form class="" action="/books" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="title">Title: </label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="format">Format: </label>
                        <select class="custom-select" name="format" value="{{ old('format') }}">
                            <option selected>Formats</option>
                                  <option value="Ebook">Ebook</option>
                                  <option value="Book">Book</option>
                                  <option value="Audio">Audio</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="type">Type: </label>
                      <select class="custom-select" name="type"  value="{{ old('type') }}">
                          <option selected>types</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="publish_year">Publish Year: </label>
                      <input type="text" class="form-control" name="publish_year" value="{{ old('publish_year') }}">
                    </div>
                </div>


                <a href="/types/create" class="text-orange float-right" target="_blank">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                     New Type
                </a>
                    <div class="form-group mt-3">
                      <label for="author">Author: </label>
                      <select class="custom-select" name="author" value="{{ old('author') }}">
                          <option selected>Pick an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
                            @endforeach
                      </select>
                    </div>

                <a href="/authors/create" class="text-orange float-right" target="_blank">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    New Author
                </a>



                <div class="form-group" style="margin-top:30px;">
                  <label for="image">Photo:</label>
                  <input type="file" class="form-control" id="image" name="image">
                  <p class="help-block text-right text-muted">Best Fit: 260x346(px)</p>
                </div>
                <hr class="mt-4">
                <div class="row">
                    <div class="form-group" style="margin-left:12px;">
                      <label for="read_date">Read date: </label>
                      <input type="text" class="form-control" name="read_date" id="datepicker"  value="{{ old('read_date') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="rate">Rate it:</label>
                          <select class="form-control" id="rate" name="rate">
                              @for ($i=0; $i < 6; $i++)
                                  <option value="{{ $i}}">{{ $i }}</option>
                              @endfor
                          </select>
                    </div>
                    <div class="form-check mb-4 mt-3 ml-3">
                        <input type="hidden" name="favorite" value="0">
                        <input type="checkbox" class="form-check-input mt-4" name="favorite" value="1">
                       <label class="form-check-label mt-3" for="favorite">Make it favorite</label>
                    </div>
                </div>

                <div class="form-group">
                  <label for="desc">About this book: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control"  value="{{ old('desc') }}"></textarea>
                </div>

                <button type="submit" name="button" class="btn btn-indigo btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add
                </button>
            </form>

            <h2 class="mt-5">Add Books in Bulk</h2>
            <hr>

            <form method="post" action="/books/create/bulk" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="upload-file">Upload</label>
                <input type="file" name="upload-file" class="form-control">
              </div>
              <input type="submit" name="submit" value="Upload" class="btn btn-indigo btn-sm">
            </form>



        </div>


    </div>
@endsection
@section('scripts')
    <script>
        $( function() {
           $( "#datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',

            });
        });
     </script>
@endsection
