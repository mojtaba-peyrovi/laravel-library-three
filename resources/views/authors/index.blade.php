@extends('layouts.master')
@section('styles')
    <style type="text/css">
        
    .jumbotron {
        background: linear-gradient(#006666, #ffff66);
    }
    </style>
@endsection
@section('title')
    Authors
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Authors</li>
    </ol>
    <div class="container mt-4">
        @include('flash::message')
    <!--Jumbotron-->
        <div class="jumbotron mt-4">
            <h1 class="h1-reponsive mb-3 blue-text"><strong class="text-white">
                <i class="fa fa-pencil"></i>
                Authors</strong></h1>
            <p class="lead text-white">
                Here is the list of all authors.
            </p>
            <hr class="my-4">
            <!-- category badges -->
            <span class="badge badge-pill pink">Default</span>
            <span class="badge badge-pill light-blue">Primary</span>
            <span class="badge badge-pill indigo">Success</span>
            <span class="badge badge-pill purple">Info</span>
            <span class="badge badge-pill orange">Warning</span>
            <span class="badge badge-pill green">Danger</span>
        </div>
    <!--Jumbotron-->
        <a href="authors/create" class="text-orange font-bold d-flex justify-content-end" target="_blank">
            New Author
        </a>
        <div class="row">
        @foreach ($authors as $author)
            @include('front.partials.author-card')
        @endforeach
    </div>
    </div>
@endsection
@section('script')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(450);
    </script>

@endsection
