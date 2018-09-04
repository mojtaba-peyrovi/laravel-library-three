@extends('layouts.master')
@section('title')
    Add an Author
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <h2>Create an Author</h2>
            <hr>
            <form class="" action="/authors" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">First Name: </label>
                          <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="last_name">Last Name: </label>
                          <input type="text" class="form-control" name="last_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          @include('front.partials.countries')
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="birth_city">Birth City: </label>
                          <input type="text" class="form-control" name="birth_city">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="occupation">Occupation: </label>
                          <input type="text" class="form-control" name="occupation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="nationality">Nationality: </label>
                          <input type="text" class="form-control" name="nationality">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="birthday">Birthday: </label>
                          <input type="text" class="form-control" name="birthday" id="datepicker">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rate">Rate him/her:</label>
                          <select class="form-control" id="rate" name="rate">
                              @for ($i=0; $i < 6; $i++)
                                  <option value="{{ $i}}">{{ $i }}</option>
                              @endfor
                          </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check mb-3 mt-3">
                            <input type="hidden" name="favorite" value="0">
                            <input type="checkbox" class="form-check-input" name="favorite" value="1">
                           {{-- <input type="checkbox" class="form-check-input" name="favorite" value="true"> --}}
                           <label class="form-check-label" for="favorite">Make him/her favorite</label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                  <label for="image">Photo:</label>
                  <input type="file" class="form-control" id="image" name="image">
                  <p class="help-block text-right text-muted">Best Fit: 260x346(px)</p>
                </div>

                <div class="form-group">
                  <label for="wiki">Wiki Link: </label>
                  <input type="text" class="form-control" name="wiki">
                </div>

                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <button type="submit" name="button" class="btn btn-indigo btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add
                </button>
            </form>
        </div>


    </div>
@endsection
@section('scripts')

@endsection
