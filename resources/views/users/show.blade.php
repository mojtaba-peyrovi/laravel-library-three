@extends('layouts.master')
@section('styles')
<style type="text/css">
    .section-title{
        font-size: 22px;
        text-align: center;
        font-family:'Raleway', sans-serif;
        color: #4d4d4d;
        margin-top: 30px;
    }
.jumbotron {
    background: linear-gradient(#006666, #ffff66);
}
.books-card img{
    height: 100px;
    width: auto;
}

 .book-card-img,
  .book-overlay{
    border-radius: 3px 15px 15px 3px;
    box-shadow: 11px 18px 23px -6px rgba(194,194,194,1);
  }
  .book-card-mask{
    background: rgba(230, 230, 230, 0.5);
  }
  .read-days-ago {
    font-size: 10px;
    position: relative;
    margin-right: 20px;
    font-weight: 500;
    /*color:rgb(102, 102, 102); */
    left:23px;
    top:33px;
    z-index: 2;
    background: rgb(204, 255, 204);
    padding:3px;
    border-radius: 5px;
    text-align: center;
    width: 70%;
  }



.edit-btn {
    font-size: 12px;
}
.user-img {
    border-radius: 6px;
    position: relative;
    top:-40px;
}
.show-left,
.show-right,
.books-row{
    border-radius: 6px;
    box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
}
.show-left{
    height: 450px;
}
.show-title{
    font-family: 'Lobster', cursive;
    font-size: 35px;
}

</style>
@endsection
@section('title')
    {{ $user->name }}
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
     @include('flash::message')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
        <li class="breadcrumb-item active">{{ $user->name }}</li>
    </ol>
    <div class="container mt-4">


        <!-- personal info -->
        <div class="row p-2">
            <div class="col-md-3 offse-md-1 show-left bg-grey-lighter p-4 d-flex justify-content-center flex-column">
                <img src="/{{ Auth::user()->photo }}" class="user-img" id="user-img">
            </div>
            <div class="col-md-9 show-right bg-grey-lighter p-4">
                <div class="mb-3 show-title text-center">
                    Personal Information
                    <a href="/users/{{ $user->id }}/edit" style="font-size:28px;">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="float-right" style="margin-top:-30px;">
                    Joined {{ $user->created_at->diffForHumans() }}
                </div>
                <hr>
                <div class="container">
                    <strong>Name: </strong>
                    {{ $user->name }}<br>
                    <strong>Last Name: </strong>
                    {{ $user->last_name == null ? "--" : $user->last_name}}<br>
                    <strong>Email: </strong>
                    {{ $user->email == null ? "--" : $user->email}}<br>

                    <hr>
                    <strong>Facebook: </strong>
                    {{ $user->facebook == null ? "--" : $user->facebook}}<br>
                    <strong>Instagram: </strong>
                    {{ $user->instagram == null ? "--" : $user->instagram}}<br>
                    <strong>Website: </strong>
                    {{ $user->website == null ? "--" : $user->website}}<br>
                    <hr>
                    <strong>Education: </strong>
                    {{ $user->education == null ? "--" : $user->education}}<br>
                    <hr>
                    <strong>Location: </strong>
                    {{ $user->location == null ? "--" : $user->location}}<br>
                </div>

            </div>

        </div> <!-- end of personal info-->

        @if ($user->books->count())

            <!-- created by user -->
            <h6 class="section-title">Created by {{ $user->name }}</h6>
            <div class="row books-row bg-grey-lighter">
                @foreach ($user->books as $book)
                    @include('front.partials.book-card')
                @endforeach
            </div> <!-- end of created by user -->

        @endif
        @if(! $has_favorite_book == null)
            <!-- favorite books section -->
                 <h6 class="section-title">Favorite Books</h6>
                 <div class="row books-row bg-grey-lighter">
                 @foreach($books as $book)
                    @foreach ($book->favorites as $favorite)
                        @if ($favorite->user_id == auth()->user()->id && $favorite->fav == 1)
                            @include('front.partials.book-card')
                        @endif
                    @endforeach
                @endforeach
            </div>  <!-- end of favorite books section -->
        @endif

        @if(! $has_favorite_author == null)
            {{-- {{ $has_favorite_author }}
            @foreach ($authorFavorites as $author)
                @include('front.partials.author-card')
            @endforeach --}}
            <!-- favorite author section -->
                 <h6 class="section-title">Favorite Authors</h6>
                 <div class="row books-row bg-grey-lighter">
                 @foreach ($authorFavorites as $author)
                        @if ($favorite->user_id == auth()->user()->id && $favorite->fav == 1)
                            @include('front.partials.author-card')
                        @endif
                @endforeach
            </div>  <!-- end of favorite authors section -->
        @endif

                <!-- last month section -->
                 <h6 class="section-title">Read Last Month</h6>
                 <div class="row books-row bg-grey-lighter">
                 @foreach($books as $book)
                        @if ($book->read_last_month() === True)
                        <div>
                            {{-- <div class="read-days-ago">
                            Read {{ \Carbon\Carbon::parse($book->read_date)->diffForHumans() }}
                            </div> --}}
                            <div style="margin-top: -30px;">
                                @include('front.partials.book-card')
                            </div>
                        </div>
                        @endif
                @endforeach
                </div>  <!-- end of last month section -->
            </div>

    </div>
@endsection
@section('script')
    <script>
        $('div.alert').not('.alert-important').delay(1500).fadeOut(550);
        $('.error').delay(2000).fadeOut(550);
    </script>
@endsection
