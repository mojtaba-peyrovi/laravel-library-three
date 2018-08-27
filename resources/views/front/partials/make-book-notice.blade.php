<style type="text/css">
	.lead{
        color: white;
        font-size: 12px;
    }
    nav {
    	background-color:rgba(255, 80, 80,0.8);
    }
	.add-book-now {
		background-color: rgba(255, 255, 255, 0.4);
		padding: 6px;
		border-radius: 5px;
		color:rgb(89, 89, 89);
	}

	.add-book-now:hover{
		background-color: rgba(255, 255, 255, 0.8);
	}
</style>
@if (! $author->books->count())
<nav class="navbar navbar-expand-lg" style="height:30px;">
    <div class="lead">
        You haven't added any book for
        <strong>{{ $author->name }}</strong> yet
        <a href="{{ route('books.create')}}" class="float-right text-dark">
            <span class="ml-2 add-book-now">Add a book now!</span>
        </a>
    </div>
</nav>
@endif
