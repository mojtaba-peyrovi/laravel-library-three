
@extends('layouts.master')
@section('styles')
<style type="text/css">
    .section-title{
        font-size: 25px;
        text-align: center;
}
.jumbotron {
    background: linear-gradient(#006666, #ffff66);
}

.books-row {
    background-color: rgb(242, 242, 242);
    border-radius: 5px;
    padding-bottom: 20px;
    box-shadow: -11px 19px 38px -18px rgba(122,116,122,0.75);
}
.demo .item{
    /* margin-bottom: 60px; */
}
.demo{
	width: 100%;
}
.content-slider li{
		    text-align: center;
		    color: #FFF;
		}
.content-slider h3 {
    margin: 0;
    padding: 70px 0;
}


</style>
@endsection
@section('title')
    Books
@endsection
@section('content')
    @include('front.partials.nav')
    @include('front.partials.login-notice')

    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Books</li>
    </ol>
    <div class="container mt-4">
            @include('flash::message')
            <a href="books/create" class="text-orange font-bold d-flex justify-content-end" target="_blank">
                New Book
            </a>
            <!-- recently added -->
            <div class="section-title">Recently Added</div>
            <div class="row books-row">
            @foreach ($books as $book)
                @if ($book->is_new() == True)
                    @include('front.partials.book-card')
                @endif
            @endforeach
            </div>  <!-- end of recently added-->

            @include('front.partials.scroller')


        <!-- all books -->
        <div class="mt-4 section-title">All Books</div>
        <div class="row books-row">
            @foreach ($books as $book)
                @include('front.partials.book-card')
            @endforeach
        </div>  <!-- end of all books-->
        <span class="d-flex justify-content-center mt-3">
            {{ $books->links() }}
        </span>
    </div>


@endsection
@section('script')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(450);
    </script>

    <!-- slider js -->
    <script src="{{ asset('js/lightslider.js') }}" charset="utf-8"></script>

@endsection
