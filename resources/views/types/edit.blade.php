@extends('layouts.master')
@section('title')
    Add a type
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/types">Types</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Edit this type</h2>
            <hr>
            <form class="" action="/types/{{ $type->id }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                  <label for="title">Title: </label>
                  <input type="text" class="form-control" name="title" value="{{ $type->title }}">
                </div>
                <div class="form-group">
                  <label for="color">Color: </label>
                  <select class="custom-select" name="color">
                      <option selected class="text-red">{{ $type->color }}</option>
                            @include('front.partials.type-color-options')
                  </select>
                  <p class="help-block mt-2">You can still use "Taken" colors.</p>
                </div>
                <button type="submit" name="button" class="btn btn-info btn-sm">
                    Submit
                </button>
                <a href="/types" class="float-right">
                    See all Types
                </a>
            </form>
            <div class="mt-3">@include('front.partials.errors')</div>
        </div>


    </div>
@endsection
@section('scripts')

@endsection
