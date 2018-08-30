
<style>
    .review-form{list-style-type:none; cursor:pointer; -moz-border-radius:0 10px 0 10px;margin:2px; padding:5px 5px 5px 5px;}
    .review-form-toggle div{cursor: auto; display: none; font-size: 13px; padding: 5px 0 5px 20px; text-decoration: none; }
    .review-form-toggle div a{color:#000000; font-weight:bold;}
    .review-form div:hover{text-decoration:none !important;}
    .review-form:before {content: "+"; padding:10px 10px 10px 0; color:green; font-weight:bold;}
    .review-form.active:before {content: "-"; padding:10px 10px 10px 0; color:green; font-weight:bold;}
    #toggle{width:500px; margin:0 auto;}


</style>



<!-- reviews row -->
@if ($book->reviews()->count())
    <div class="row reviews-section" id="reviews-section">
        @if ($book->reviews()->count())
            <div class="col-md-12 bg-grey-lighter related-books mt-4 p-3">
                <span class="about-book-title">Reviews</span>
                <hr>
                @foreach ($book->reviews as $review)
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
                <div class="float-left">
                    <!-- accordion -->
                    <div id="toggle" style="margin-bottom:-20px;">
                        <ul class="review-form-toggle">
                            <li class="review-form">New Review</li>
                            <div>
                                Please write your review here
                                <form class="" action="index.html" method="post">

                                      <input type="text" class="form-control col-md-3" placeholder="Review Title">

                                </form>
                            </div>
                        </ul>
                    </div> <!--end of accordion-->
                </div>
            </div>
        @endif
    </div> <!-- end of reviews row -->
@else
    <a href="#">add a review</a>
@endif
