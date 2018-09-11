
<style>
    .review-form{list-style-type:none; cursor:pointer; -moz-border-radius:0 10px 0 10px;margin:2px; padding:5px 5px 5px 5px;}
    .review-form-toggle div{cursor: auto; display: none; font-size: 13px; padding: 5px 0 5px 20px; text-decoration: none; }
    .review-form-toggle div a{color:#000000; font-weight:bold;}
    .review-form div:hover{text-decoration:none !important;}
    .review-form:before {content: "+"; padding:10px 10px 10px 0; color:green; font-weight:bold;}
    .review-form.active:before {content: "-"; padding:10px 10px 10px 0; color:green; font-weight:bold;}
    #toggle{width:100%; margin:0 auto;}

    .progress-bar {
        margin-bottom: 10px;
        height:30px;
    }

</style>



<!-- reviews row -->


@if ($book->reviews()->count())
    <div class="row reviews-section" id="reviews-section">
        @if ($book->reviews()->count())
            <div class="col-md-12 bg-grey-lighter related-books mt-4 p-3">
                <span class="about-book-title">
                    Reviews
                </span>
                <span class="float-right"style="font-weight:400;">
                    <a href="/books/{{ $book->id }}/reviews">
                        See all reviews
                    </a>
                </span>
                <hr>



                @foreach ($book->reviews->sortbyDesc('created_at')->take(3) as $review)
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
                            {{ Carbon\Carbon::parse($review->created_at)->format('d F Y')}}
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
                <div class="row">
                    <!-- accordion -->
                    <div id="toggle" style="margin-bottom:-20px;" class="col-md-10 col-sm-12">
                        <ul class="review-form-toggle">
                            <li class="review-form" style="position:relative; left:-50px;">New Review</li>
                            <div>
                                Please write your review here
                                <form class="" action="{{ route('add-review', $book->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="d-flex">
                                        <select class="form-control mr-2" id="rate" name="rate" style="margin-left:-20px;">
                                            @for ($i=0; $i < 6; $i++)
                                                <option value="{{ $i}}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <input type="text" class="form-control" name="review_title" placeholder="Review Title">
                                    </div>

                                    <textarea class="form-control mt-3" name="review_body" rows="8" cols="80" placeholder="Review"></textarea>
                                    <button type="submit" class="btn btn-sm btn-primary float-right mb-3" style="margin-right:-2px;">Submit</button>
                                </form>

                            </div>
                        </ul>
                    </div> <!--end of accordion-->
                </div>
            </div>
        @endif
    </div> <!-- end of reviews row -->
@else
    <div class="row reviews-section" id="reviews-section">

            <div class="col-md-12 bg-grey-lighter related-books mt-4 p-3">
                <span class="about-book-title">
                    Reviews
                </span>
                <!-- accordion -->
                <div id="toggle" style="margin-bottom:-20px;margin-left:150px;position:relative;top:-25px;" class="col-md-10 float-right">
                    <ul class="review-form-toggle">
                        <li class="review-form">Write a Review</li>
                        <div>
                            Please write your review here
                            <form class="" action="{{ route('add-review', $book->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="d-flex">
                                    <select class="form-control mr-2" id="rate" name="rate" style="margin-left:-20px;">
                                        @for ($i=0; $i < 6; $i++)
                                            <option value="{{ $i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <input type="text" class="form-control" name="review_title" placeholder="Review Title">
                                </div>

                                <textarea class="form-control mt-3" name="review_body" rows="8" cols="80" placeholder="Review"></textarea>
                                <button type="submit" class="btn btn-sm btn-primary float-right mb-3" style="margin-right:-2px;">Submit</button>
                            </form>

                        </div>
                    </ul>
                </div> <!--end of accordion-->
            </div>

    </div> <!-- end of reviews row -->
@endif
