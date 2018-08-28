<style type="text/css">
.author-overlay{
    box-shadow: -10px 11px 8px -7px rgba(122,116,122,0.75);
}
.author-card-mask{
    background: rgba(153, 153, 153, 0.5);
}
.author-card-mask p{
    font-size: 10px;
    color: white;
}
.card-author-title {
      font-size: 13px;
      font-weight: 600;
      margin-top: -12px;
}
.author-card-img,
.author-overlay{
  border-radius: 0.9rem 0.1rem 0.9rem 0.1rem;
  width:120px;
}

</style>

<div class="mt-4 mr-4 ml-4">
    @if ($author->is_new() == True)
      @include('front.partials.new-author-badge')
    @else
      <div style="width:4em;height:1.5em;;position:relative;top:20px;right:-63px;"></div>
    @endif
    <div class="mb-3">
        <div class="view overlay author-overlay">
            <img class="z-depth-1-half author-card-img" src="{{ $author->photo }}">
            <a href="/authors/{{ $author->id }}">
            <div class="mask flex-center author-card-mask">
            <p class="white-text">Read More...</p>
            </div>
            </a>
        </div>
        <strong>
            <a href="/authors/{{ $author->id }}">
                <div class="mt-3">@include('front.partials.author-reviews')</div>
                <div class="card-author-title">
                    {{ str_limit($author->fullName(), $limit = 15, $end = '...') }}<br>
                </div>
                ({{ $author->books->count()}} books)


            </a>
        </strong>
    </div>
</div>
