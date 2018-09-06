@extends('layouts.master')
@section('styles')
<style type="text/css">

    .reviews {
        border-radius: 6px;
        box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
    }
    .star-on,
    .star-off {
        width: 13px;
        height: 13px;
        margin-top: -20px;
    }

    .review-section-title h3{
        font-family: 'Lobster', cursive;
        font-size: 35px;
    }
</style>
@endsection
@section('title')
    Books
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')

    <div class="container mt-4">
        <div class="reviews bg-grey-lighter p-4">
            <div class="review-section-title">
                <h3 class="text-center">{{ $book->title }}</h3>
                <h6 class="text-center">by
                    <a href="/authors/{{ $book->author->id }}">
                        {{ $book->author->fullname() }}
                    </a>
                </h6>
                <h6 class="">There are {{ $review_counts }} reviews for
                    <a href="/books/{{ $book->id }}">
                        <strong>"{{ $book->title }}"</strong>
                    </a>

                </h6>

                @foreach ($reviews as $review)
                <hr>
                <div class="row">
                    <div class="col-md-2 text-center mt-2">
                        <!-- rating stars -->
                        <span class="rates">
                            <span class="hidden">{{ $rate = $review->rate }}</span>
                            @for ($i=0; $i < $rate; $i++)
                                <img src="/img/star.png" class="star-on">
                            @endfor
                            <span class="hidden">{{ $rate_off = 5 - ($review->rate) }}</span>
                            @for ($i=0; $i < $rate_off; $i++)
                                <img src="/img/star-off.png" class="star-off">
                            @endfor
                        </span>
                        <!-- end of stars-->
                        <div style="font-size:14px;">
                            by
                            <a href="/users/{{ $review->user['id'] }}">{{ $review->user['name'] }}</a>
                        </div>
                        <div style="font-size:14px;margin-top:5px;">
                            {{ $book->created_at->format('Y-m-d') }}
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <div style="font-size:18px; font-weight:500;">{{ ucwords($review->review_title) }}</div>
                            <span style="font-size:12px;color:green;font-weight:400;">
                            <span class="hidden">{{ $user_fav = $review->user['favorites']->where('book_id',$book['id'])}}</span>
                            <span class="hidden">{{ $read = $book->reads->where('user_id',$review->user_id)}} </span>
                                {{ $user_name = $review->user->name }}
                                {{-- {{ $user_name == Auth()->user()->name ? ' (You) have ':'has ' }} --}}
                                @if ($user_name == @Auth()->user()->name)
                                    @if ($read_times = $read->count() == 0)
                                        {{ " (you) haven't read this book yet" }}
                                        {{ $user_fav->first()['fav'] == '1'?', but Favorited the book':'' }}
                                    @else
                                        {{ ' (you) have read this book' }}
                                        <a href="#reads">
                                            {{ $read_times = $read->count() }}
                                            {{ str_plural('time', $read_times) }}
                                        </a>
                                        {{ $user_fav->first()['fav'] == '1'?', and Favorited the book':'' }}
                                    @endif
                                @else
                                    @if ($read_times = $read->count() == 0)
                                        {{ " hasn't read this book yet" }}
                                        {{ $user_fav->first()['fav'] == '1'?', but Favorited the book':'' }}
                                    @else
                                        {{ ' has read this book' }}
                                        {{ $read_times = $read->count() }}
                                        {{ str_plural('time', $read_times) }}
                                        {{ $user_fav->first()['fav'] == '1'?', and Favorited the book':'' }}
                                    @endif
                                @endif

                            </span>
                            <p>
                                {{ $review->review_body }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="margin-left:40%;">
                {{ $reviews->links() }}
            </div>


        </div>
    </div>









@endsection
