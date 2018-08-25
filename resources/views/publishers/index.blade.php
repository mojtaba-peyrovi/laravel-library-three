@extends('layouts.master')
@section('title')
    Publishers
@endsection
@section('content')

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Publishers</li>
    </ol>

    <div class="container mt-4">
            @include('flash::message')
            <!--Jumbotron-->
                <div class="jumbotron mt-4">
                    <h1 class="h1-reponsive mb-3 blue-text"><strong class="text-white">
                        <i class="fa fa-book"></i>
                        Publishers</strong></h1>
                    <p class="lead text-white">
                        All publishers
                    </p>
                    <hr class="my-4">
                    <!-- search form -->
                    <form class="form-inline d-flex justify-content-center">
                      <label class="sr-only" for="inlineFormInputName2">Name</label>
                      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                      </div>

                      <div class="form-check mb-2 mr-sm-2">
                        <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                        <label class="form-check-label" for="inlineFormCheck">
                          Remember me
                        </label>
                      </div>

                      <button type="submit" class="btn btn-warning btn-sm mb-2">Search</button>
                    </form>
                </div>
            <!--Jumbotron-->
<div class="row">
    @foreach ($publishers as $publisher)
        <div class="col-md-4 mt-4 mr-3">
            <div class="card">
                <a href="/publishers/{{ $publisher->id }}">
                    <div class="card-header" style="background:orange;color:white;font-weight:600;">
                        {{ $publisher->name }}
                    </div>
                </a>

                <div class="card-body">
                    <ul>
                        <li> {{ $publisher->country }}</li>
                        <li>{{ $publisher->phone }}</li>
                        <li>{{ $publisher->address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
