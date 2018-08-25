<form method="post" action="{{ route('author-unfavorite', $author->id) }}" class="float-right">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-info btn-sm" style="padding:8px;">
        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
    </button>
</form>
