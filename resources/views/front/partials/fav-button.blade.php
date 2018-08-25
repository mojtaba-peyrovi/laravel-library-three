<form method="post" action="{{ route('book-favorite', $book->id) }}" class="float-right fav-btn">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-info" style="padding:8px;">
        <i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i>
    </button>
</form>
