
<style type="text/css">
    .book-img {
        border-radius: 6px 20px 20px 6px;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
        position: relative;
        -webkit-box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
        -moz-box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
        box-shadow: inset -4px 11px 52px -2px rgba(31,31,31,1);
    }
    .fav-badge {
        z-index: 30;
        position: absolute;
        top: 320px;
    }

   .book-show-right,
   .book-show-left,
   .related-books {
     border-radius: 6px;
     box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
   }

    .about-book-title{
        font-size: 14px;
        font-weight: 500;
        color: white;
        background:rgb(179, 179, 179);
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
        font-family: 'Arial',serif;
    }

    #fav-popup,
    #unfav-popup {
        font-size: 12px;
        font-weight: 500;
        background:rgb(242, 242, 242);
        box-shadow: -18px 19px 11px -15px rgba(0,0,0,0.75);
        border: 1px gray solid;
        padding:10px 20px;
        border-radius: 5px;
        text-align: center;
    }
    .book-show-title #title{
        font-family: 'Lobster', cursive;
        font-size: 35px;
    }
    .book-show-title #year {
        font-family: 'Noto Serif', serif;
        font-size: 20px;
    }
    .book-show-desc {
        font-family: 'Unna', serif;
        font-size: 16px;
        margin-top: 15px;
    }
    .book-show-desc::first-letter{
        font-size: 200%;
    }
    .book-show-subtitle {
        font-family: 'Oswald', sans-serif;
    }
    .read-card {

    }
    .read-card form{
        display: flex;
        justify-content: space-between;
        padding: 5px 10px 5px;

    }
    .read-card form:first-child {
        margin-bottom: 1px;
    }
    .book-history ul{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .book-show-left{
        /* max-height: 1000px; */
    }
    .reviews {
        font-size: 13px;
        margin-top: -5px;
        margin-left: 15px;
    }
    .reads-list li{
        list-style: none;
    }

</style>


@extends('layouts.master')
@section('title')
    {{ $book->title }}
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item active">
            {{ $book->title }}
        </li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="book-show-left col-md-3 bg-grey-lighter p-4">
                    <!-- favorite badge -->
                    @if(Auth::check())
                        @if(! $favorites_exist == null)
                            <span class="badge badge-success fav-badge" style="margin-top:-20px;">Favorited</span>
                        @endif
                   @endif <!-- enf of favorite badge -->

               <!-- book image -->
                <div class="photo-container">
                     @include('flash::message')
                    <img src="/{{ $book->photo }}" alt="" class="book-img">
                </div>
                <!-- end of book image -->

                <div class="book-history">
                    <!-- read dates -->
                    @if(Auth::check())

                        <ul class="reads-list">
                            <li class="mt-4 about-book-title" style="margin-left: -40px;"  id="reads">
                                Read Dates
                            </li>
                            @foreach($book->reads as $read)
                                @if ($read->user_id == Auth::user()['id'])
                                    <li class="card read-card mt-2" style="margin-left: -40px;">
                                        <form class="" action="{{ route('remove-read', [$book->id, $read->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ $read->read_date }}
                                            <button type="submit">
                                                <i class="fa fa-times-circle" aria-hidden="true" style="margin-top:5px; margin-bottom:3px;"></i>
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            @endforeach
                            <li style="margin-left:-27px;">
                                <!-- add read form -->
                                <form class="form-inline" method="post" action="{{ route('add-read', $book->id) }}">
                                    {{ csrf_field() }}
                                     <div class="row mt-2">
                                          <input type="text" class="form-control read-add" name="read_date" id="datepicker" placeholder="New Read Date">
                                          <button type="submit" class="btn btn-success" style="padding:8px;margin:1px;">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                          </button>
                                      </div>
                                </form> <!-- end of add read form -->
                            </li>
                            @include('front.partials.errors')
                        </ul><!-- end of read dates -->
                   @endif

                </div>

                @include('front.partials.book-show-insights')
            </div>


            <div class="book-show-right col-md-8 offset-md-1 bg-grey-lighter p-4">
                <div class="book-show-header">
                    <h1 class="book-show-title">
                    @include('front.partials.format-badges')
                    <span id="title">{{ $book->title }}</span>
                    <span id="year">
                        ({{ $book->publish_year }})
                    </span>
                    </h1>

                    <!-- type badge -->
                    <span class="badge type-badge {{ $book->type['color'] }} mt-3">
                    {{ $book->type['title'] }}
                    </span>
                    <p class="mt-2 book-show-subtitle">
                        by <a href="/authors/{{ $book->author['id'] }}">
                        {{ $book->author['name'] }}
                        {{ $book->author['last_name'] }},
                        (Author)
                        </a>
                        -
                        Publisher:
                        <a href="/publishers/{{ $book->publisher['id']}}">
                            {{ $book->publisher['name'] }}
                        </a>
                    </p>
                    <!-- reviews -->
                    <div class="d-flex jusify-content-center">
                        @include('front.partials.book-reviews')
                        <a class="reviews" href="#reviews-section">
                            {{ $reviews = $book->reviews()->count() }}
                             {{str_plural('Review', $reviews)}}
                         </a>
                    </div>
                    <!-- end of reviews -->


                    <!-- favorite, delete, edit buttons -->
                        <div class="d-flex justify-content-end fav-delete-edit-bottons">
                            @if ($book->user['id'] == @Auth::user()['id'])
                                <!-- edit button -->
                                <form method="get" action="/books/{{ $book->id}}/edit">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        EDIT
                                    </button>
                                </form> <!-- end of edit button -->
                                {{-- <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm" style="padding:5px;">Edit</a> --}}

                                <!-- delete button -->
                                <form class="pull-right" action="{{ action('booksController@destroy', $book->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button class="btn btn-sm btn-danger" data-toggle="confirmation"
                                            data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
                                            data-btn-ok-icon-class="" data-btn-ok-icon-content=""
                                            data-btn-cancel-label="" data-btn-cancel-class="btn-danger"
                                            data-btn-cancel-icon-class="" data-btn-cancel-icon-content="close"
                                            data-title="Are You Sure?" data-content="You will lose this book forever!">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            DELETE
                                    </button>
                                </form>  <!-- end of delete butoon -->
                            @endif
                            <!-- favorite button-->
                            @if(Auth::check())
                                @if(! $favorites_exist == null)
                                    @include('front.partials.unfav-button')
                                @else
                                    <div id="fav-popup">
                                        Favorite this book!
                                    </div>
                                    @include('front.partials.fav-button')
                                @endif
                            @endif
                            <!-- end of favorite button --->

                        </div> <!-- end of favorite, delete, edit buttons -->
                        <!-- created by-->
                        <span class="text-muted font-small ">Created by:
                            <a href="/users/{{ $book->user['id']}}">
                             {{ $book->user['name'] }}
                             </a>
                         </span>
                        <span class="text-muted font-small ml-4">({{ $book->created_at->DiffForHumans() }})</span>
                        <!-- end of created by -->

                </div>

                 <!-- about section -->
                    <div>
                        <hr style="margin-top:-2px;">
                </div> <!-- end of header-->

                    <!-- about book section -->
                    <span class="mb-2 about-book-title mt-3">About the book</span>
                    <p class="book-show-desc">{{ strip_tags($book->desc) }}</p>

                    <!-- end of about book section -->
                @if (Auth::check())
                    <!-- quotes section -->
                    <hr class="mt-2 mb-2">
                      <div class="mt-4">
                          <span class="mb-2 about-book-title">
                              {{ @Auth::user()['name'] }}'s Favorite Quotes
                          </span>
                          @foreach ($book->quotes as $text)
                              @if ($text->user['id'] === @Auth::user()['id'])
                                  @include('front.partials.blockquotes')
                              @endif
                          @endforeach
                          @include('front.partials.add-quote-form')
                      </div><!-- end of quotes section -->
                @endif


            </div> <!-- end of right section-->

        </div> <!-- end of first row -->


        @include('front.partials.reviews-section')

        <div class="row">
            @if ($related_books->count())
                <div class="col-md-12 bg-grey-lighter related-books mt-4 p-3">
                    <span class="about-book-title">Related Books</span>
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
        $('.error').delay(2000).fadeOut(550);
    </script>
    <script type="text/javascript">
        var ref = $('.fav-btn')
        var popup = $('#fav-popup');
        popup.hide();
        ref.hover(function(){
            popup.show();
            var popper = new Popper(ref,popup,{
                placement: 'top',
                modifiers: {
                    flip: {
                        behavior: ['left','right','top','bottom']
                    }
                },
                offset: {
                    enabled: true,
                    offset: '0,10'
                }
            });
        });
        ref.mouseleave(function(event) {
            popup.hide();
        });
    </script>

@endsection
