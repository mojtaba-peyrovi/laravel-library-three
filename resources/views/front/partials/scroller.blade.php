<style type="text/css">
  .book-card-img,
  .book-overlay{
    border-radius: 0.25rem 0.7rem 0.7rem 0.25rem;
    width:120px;
  }
  .book-overlay{
    box-shadow: -10px 11px 8px -7px rgba(122,116,122,0.75);
  }
  .book-card-mask{
    background: rgba(153, 153, 153, 0.5);
  }
  .book-card-mask p {
    font-size: 10px;
    color: white;
  }
  .card-book-title{
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    font-weight: 400;
    margin-left: 15px;
    margin-top: -12px;
  }
  .card-book-year{
    margin-top: -12px;
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    font-weight: 400;
  }
  .index-type-badge{
    z-index: 2;
    position: relative;
    top:175px;
    /* left: 5px; */
    /*width: 100%;*/
  }

  .card-book-author{
      font-size: 11px;
      float: left;
      position: relative;
  }

</style>
<div class="section-title mt-3">Featured</div>
<div class="row books-row">
    <div class="container">
        <div class="demo mt-3">
                <ul id="content-slider" class="content-slider">
                    @foreach ($books as $book)
                        <li>
                            <div class="mr-5 ml-5" style="margin-top:-30px;">
                                <span class="badge index-type-badge {{ $book->type['color'] }}">
                                    {{ $book->type['title'] }}
                                </span>
                                @if ($book->is_new() == True)
                                    <div><img src="{{ asset('img/new-book-tag.svg') }}" style="width:4em;height:auto;z-index:3;position:relative;top:20px;right:-53px;"></div>

                                @else
                                  <div style="width:4em;height:1.5em;position:relative;top:20px;right:-63px;"></div>
                                @endif
                                <div class="mb-3">
                                    <div class="view overlay book-overlay">
                                        <img class="z-depth-1-half book-card-img" src="/{{ $book->photo }}" alt="">
                                        <a href="/books/{{$book->id}}">
                                            <div class="mask flex-center book-card-mask">
                                                <p class="">Read More...</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                @include('front.partials.book-reviews')
                                <a href="/books/{{ $book->id }}">
                                    <div class="row">
                                        <span class="card-book-title">{{ str_limit($book->title, $limit = 10, $end = '...') }}</span>
                                        <span class="card-book-year">({{ $book->publish_year }})</span>
                                    </div>
                                </a>
                            </div>

                        </li>
                    @endforeach
                </ul>
        </div>
    </div>
</div>
