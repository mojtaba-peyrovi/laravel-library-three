@extends('layouts.master')
@section('styles')
    <style media="screen">
    .fav-badge,
    .unfav-badge {
        z-index: 30;
        position: absolute;
        top: 320px;
    }
    .author-img {
        border-radius: 1.3rem 0.1rem 1.3rem 0.1rem;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
        position: relative;
    }
    .author-show-right,
    .author-show-left,
    .author-books{
         border-radius: 6px;
         box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
    }
    .about-author-title{
        font-size: 14px;
        font-weight: 500;
        color: white;
        background:rgb(179, 179, 179);
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
        font-family: 'Arial',serif;
    }
    .author-show-title #title{
        font-family: 'Lobster', cursive;
        font-size: 35px;
    }
    .author-show-title #occupation{
        font-family: 'Noto Serif', serif;
        font-size: 20px;
    }
    .author-show-subtitle {
        font-family: 'Oswald', sans-serif;
        font-weight: lighter;
        font-size: 13px;
    }
    #fav-popup,
    #unfav-popup
   {
        font-size: 12px;
        font-weight: 500;
        background:rgb(242, 242, 242);
        box-shadow: -18px 19px 11px -15px rgba(0,0,0,0.75);
        border: 1px gray solid;
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
    }
    .author-show-desc {
        font-family: 'Unna', serif;
        font-size: 16px;
        margin-top: 15px;
    }
    .author-show-desc::first-letter{
        font-size: 200%;
    }
    </style>
@endsection
@section('title')
    {{ $author->fullName() }}
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
    @include('front.partials.make-book-notice')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item active">
            {{ $author->fullName() }}
        </li>
    </ol>
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="author-show-left col-md-3 bg-grey-lighter p-4" id="author-show-left">
                <!-- favorite badge -->
                    @if(Auth::check())
                        @if(! $favorites_exist == null)
                            <span class="badge badge-success fav-badge"  style="margin-top:-20px;">Favorited</span>
                        @endif
                   @endif <!-- enf of favorite badge -->
                   <!-- book image -->
                   <div class="photo-container">
                       @include('flash::message')
                       <img src="{{ $author->photo }}" alt="" class="author-img">
                    </div><!-- end of book image -->

                  <h4 class="mt-4 about-author-title">{{ $author->fullName() }}&nbsp({{ $author->nationality }})</h4>
                  @include('front.partials.author-info-table')
            </div>
            <div class="author-show-right col-md-8 offset-md-1 bg-grey-lighter p-4">
                <div class="author-show-header">
                    <h1 class="author-show-title">
                        <span id="title">{{ $author->fullName() }}</span>
                        <span id="occupation">
                             ({{ $author->occupation }})
                        </span>
                    </h1>
                    <!-- rating stars -->
                    <div class="mt-2">
                        @include('front.partials.author-rate-stars')
                    </div>
                    <p class="author-show-subtitle">
                        <a href="{{ $author->wiki }}" target="_blank">Wikipedia</a>
                    </p>

                    <!-- favorite, delete, edit buttons -->
                    <div class="d-flex justify-content-end fav-delete-edit-bottons">
                        @if ($author->user['id'] == Auth::user()['id'])
                            <form method="get" action="/authors/{{ $author->id }}/edit">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    EDIT
                                </button>
                            </form>
                            <form class="pull-right" action="{{ action('AuthorsController@destroy', $author->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <button class="btn btn-sm btn-danger" data-toggle="confirmation"
                                        data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
                                        data-btn-ok-icon-class="" data-btn-ok-icon-content=""
                                        data-btn-cancel-label="" data-btn-cancel-class="btn-danger"
                                        data-btn-cancel-icon-class="" data-btn-cancel-icon-content="close"
                                        data-title="Are You Sure?" data-content="You will lose this author forever!">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        DELETE
                                </button>
                            </form>
                        @endif
                        <!-- favorite button-->
                        @if(Auth::check())
                            @if(! $favorites_exist == null)
                                <div id="unfav-popup">
                                    Unfavorite this author!
                                </div>
                                @include('front.partials.author-unfav-button')
                            @else
                                <div id="fav-popup">
                                    Favorite this author!
                                </div>
                                @include('front.partials.author-fav-button')
                            @endif
                        @endif <!-- end of favorite button --->

                    </div><!-- end of favorite, delete, edit buttons -->
                    <!-- created by-->
                    <span class="text-muted font-small ">Created by:
                        <a href="/authors/{{ $author->user->id}}">
                         {{ $author->user['name'] }}
                         </a>
                     </span>
                    <span class="text-muted font-small ml-4">({{ $author->created_at->DiffForHumans() }})</span>
                    <!-- end of created by -->
                    <hr style="margin-top:-2px;">
                </div><!-- end of header -->

                <!-- about book section -->
                    <span class="font-bold mb-2 about-author-title mt-3">About Author</span>
                    <p class="author-show-desc">{{ $author->desc }}</p>
                <!-- end of about book section -->
            </div>
        </div> <!-- end of first row -->
        <div class="row">
            @if ($author->books->count())
                <div class="col-md-12 bg-grey-lighter mt-4 author-books p-3">
                    <span class="about-author-title">{{ $author->name }}'s Books:</span>
                    <hr>
                    <div class="row">
                        @foreach ($related_books as $book)
                            @include('front.partials.book-card')
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
    $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    // other options
    });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(1500).fadeOut(550);
    </script>
    <script src="/js/popups.js"></script>
@endsection
