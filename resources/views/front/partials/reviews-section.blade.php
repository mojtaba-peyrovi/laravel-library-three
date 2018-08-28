<!-- reviews row -->
<div class="row">
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
                        <a href="/users/{{ $book->user->id }}">{{ $review->user->name }}</a>
                    </div>
                    <div style="font-size:14px;margin-top:5px;">
                        {{ $book->created_at->format('Y-m-d') }}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="container">
                        <div style="font-size:18px;margin-bottom:10px; font-weight:500;">{{ ucwords($review->review_title) }}</div>
                        <span style="font-size:12px;color:green;font-weight:400;">
                        <span class="hidden">{{ $user_fav = $review->user->favorites->where('book_id',$book->id)}}</span>
                        <span class="hidden">{{ $read = $book->reads->where('user_id',$review->user_id)}} </span>
                            {{ $user_name = $review->user->name }} has read this book {{ $read_times = $read->count() }}
                            {{ str_plural('time', $read_times) }}  {{ $user_fav->first()['fav'] == '1'?' and Favorited this book':'' }}

                        </span>
                        <p>
                            {{ $review->review_body }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div> <!-- end of reviews row -->
