<style media="screen">
.quote-body::before{
  content: open-quote;
  font-size: 2.5em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
.blockquote-header {
    color: rgb(89, 89, 89);
    display: flex;
    justify-content: space-between;
    background-color: #ffe6cc;
    font-family: 'Arial',serif;
    font-size: 13px;
    padding:2px 10px;
}
.quote-close-btn{
    color: rgb(89, 89, 89);
}
.card-header div{
    margin-top: 2px;
}
</style>
<div class="card mt-3 mb-3">
    <div class="card-header blockquote-header">
        <div>
            {{ $text->created_at->DiffForHumans() }}
        </div>
        <form class="" action="{{ route('remove-quote', [$book->id, $text->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" name="button" class="quote-close-btn">
                <i class="fa fa-times-circle" aria-hidden="true" style="margin-top:5px; margin-bottom:-5px;"></i>
            </button>
        </form>
    </div>
    <div class="card-body">
          <p class="mb-0 quote-body">{{ $text->quote }}</p>
          @if ($text->footer && $text->cite)
              <footer class="blockquote-footer">{{ $text->footer }}
                  <cite title="Source Title">, {{ $text->cite }}</cite>
              </footer>
          @endif
        </blockquote>
    </div>
</div>
