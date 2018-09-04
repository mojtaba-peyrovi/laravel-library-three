@extends('layouts.master')
@section('styles')
<style type="text/css">


/*
 * Sidebar
 */

.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  background: white;
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
}

/*
 * Content
 */

[role="main"] {
  padding-top: 48px; /* Space for fixed navbar */
}




.acc-item{
    margin-bottom: -20px;
}
.acc-item ul{
    margin-left: 70px;
    margin-top: -20px;
}
.index-book-title{
    font-size: 14px;
    font-weight: 500;
    color: white;
    background:rgb(179, 179, 179);
    padding:10px 20px;
    border-radius: 5px;
    text-align: center;
    font-family: 'Arial',serif;
}
.book-index-left,
.book-index-right{
    border-radius: 6px;
    box-shadow: -11px 19px 38px -15px rgba(122,116,122,0.75);
}
.index-title{
    font-family: 'Lobster', cursive;
    font-size: 35px;
}
.pagination {
    margin-left: 30%;
    margin-top: 20px;
}
#search-name {
    width:400px;
}
#search-year {
    width: 150px;
}
#search-author {
    width:350px;
}
.search-form {
    margin-top: -40px;
}
.genres-filter li {
    margin-left: 60px;
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
        @include('flash::message')
            <div class="container-fluid" style="margin-top:-16px;">
              <div class="row">
                <nav class="col-md-2 d-none d-md-block sidebar book-index-left bg-grey-lighter">
                  <div class="sidebar-sticky">
                      <div class="index-book-title">Filters</div>
                      <hr>
                      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-2 text-muted">
                        Read Each Month
                      </h6>

                        <div class="accordion" id="accordionExample">
                            <div class="acc-item">
                                <button class="btn btn-link d-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  2018
                                </button>
                                <ul id="collapseOne" class="collapse show list-unstyled" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <li>January</li>
                                    <li>February</li>
                                    <li>March</li>
                                </ul>
                            </div>
                            <div class="acc-item">
                                <button class="btn btn-link collapsed d-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 2017
                                </button>
                                <ul id="collapseTwo" class="collapse list-unstyled" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <li>January</li>
                                    <li>February</li>
                                    <li>March</li>
                                </ul>
                            </div>
                            <div class="acc-item">
                                <button class="btn btn-link collapsed  d-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  2016
                                </button>
                                <ul id="collapseThree" class="collapse list-unstyled" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <li>January</li>
                                    <li>February</li>
                                    <li>March</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-2 mt-3 text-muted">
                         Genres
                        </h6>
                        <ul class="list-unstyled genres-filter">
                            @foreach ($types as $type)
                                <li>{{ $type->title }}</li>
                            @endforeach
                        </ul>
                        <hr>

                  </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="row d-flex justify-content-center">

                        <!-- search form -->
                        <form class="form-inline search-form" method="post" action="">
                            {{ csrf_field() }}
                          <label class="sr-only" for="search-name">Name</label>
                          <input type="text" class="form-control mb-2 mr-sm-2" id="search-name" placeholder="Book Name" name="name">

                          <label class="sr-only" for="search-year">Year</label>
                          <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" id="search-year" placeholder="Book Year" name="year">
                          </div>

                          <label class="sr-only" for="search-author">Author</label>
                          <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" id="search-author" placeholder="Book Author" name="author">
                          </div>

                          <button type="submit" class="btn btn-success btn-sm mb-3">Submit</button>
                      </form> <!-- end of searh form -->

                    </div>
                  <div class="flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                      <div class="d-flex justify-content-between">

                          <h3 class="index-title ml-5 mt-3">Books</h3>

                          <div class="dropdown sort-button mr-5 mt-2">
                              <a class="btn btn-lime btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Stars</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Adding Date</a>
                                <a class="dropdown-item" href="#">Reading Date</a>
                              </div>
                          </div>
                      </div>
                      <small class="text-muted ml-5">
                          <span class="font-bold">
                            {{ $books->total() }}
                          </span>
                          results found</small>
                  </div>

                  <div class="row">
                      @foreach ($books as $book)
                          @include('front.partials.book-card')
                      @endforeach

                      <div class="pagination">
                          {{ $books->links() }}
                      </div>
                  </div>

                </main>
              </div>
            </div>




@endsection
@section('script')
    <script>
        $('div.alert').not('.alert-important').delay(2000).fadeOut(450);
    </script>

    <!-- slider js -->
    <script src="{{ asset('js/lightslider.js') }}" charset="utf-8"></script>

@endsection
