@extends('layouts.master')
@section('styles')
<style type="text/css">
.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

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

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
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
                  </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <div class="flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                    <h3 class="h2">Books</h3>
                    <small class="text-muted">345 results found</small>
                  </div>

                  <div class="">
                      
                  </div>
                </main>
              </div>
            </div>



@endsection
@section('script')


@endsection
