<form method="post" action="{{ route('book-unfavorite', $book->id) }}" class="float-right unfav-btn">
    {{ csrf_field() }}
    <button type="submit" class=" btn btn-info" style="padding:8px;" id="">
        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
    </button>
</form>
