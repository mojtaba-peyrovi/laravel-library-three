<style type="text/css">
    #user-icon {
        width:25px;
        height:25px;
    }
    nav {
        font-size: 12px;
        /* height: 60px; */
    }
    .books-menu-item li,
    .user-menu a{
        border-bottom: 1px solid white;
    }

    .books-menu-item li:hover {
        background-color: #00cccc;
    }
 .books-menu-item li{
     margin-right: 5px;
     margin-left: 5px;
 }
    .dropdown-primary {
        background-color:#006666;
        width:1000px;
        padding: 10px;
    }

    .site-name {
        font-family: 'Monoton', cursive;
        font-size: 25px;
    }

    .user-menu a:hover{
        background-color: #00cccc;
    }

    .user-menu {
        background-color:#006666;
        width:200px;

    }

    .btn-group {
        /* padding-right: 50px; */
    }
    .navbar {
        background-color:#009999;
    }
    .signup-img {
        max-width: 100%;
        height: auto;
        padding: 2px;
        margin-top: 50px;
    }
    .signup-img:hover {
        background-color:
    }
    .user-menu-header {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-top: -10px;
        margin-right: -1px;
        border-radius: 5px;
        background: #ff8800;
    }



</style>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">
        <span class="site-name">ANNA & MOJI'S LIBRARY</span>
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Books</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">Books</h5>
                            <ul class="list-unstyled books-menu-item">
                                <li>
                                    <a href="/books">All Books</a>
                                </li>
                                <li>
                                    <a href="#">Recently added Books</a>
                                </li>
                                <li>
                                    <a href="#">Most Popular Books</a>
                                </li>
                            </ul>
                            <h5 class="text-white mt-5 ml-2">Book Format</h5>
                            <ul class="list-unstyled books-menu-item">
                                <li>
                                    <a href="#">Ebooks</a>
                                </li>
                                <li>
                                    <a href="#">Physical Books</a>
                                </li>
                                <li>
                                    <a href="#">Audio Books</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">Genres</h5>
                            <ul class="list-unstyled books-menu-item">
                                <li>
                                    <a href="#">All Genres</a>
                                </li>
                                <li>
                                    <a href="#">Popular Genres</a>
                                </li>
                            </ul>

                            @if (! @Auth::check())
                                <div class="view zoom mt-5">
                                    <a href="/register">
                                    <img src="{{ asset('img/call-to-action-signup.jpg')}}" class="img-fluid " alt="">
                                        <div class="mask flex-center">
                                            <p class="white-text"></p>
                                        </div>
                                    </a>
                                </div>
                            @endif

                        </div>
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">
                                <i class="fa fa-user"></i>
                                Members Only
                            </h5>
                            <ul class="list-unstyled books-menu-item">
                                @if (@Auth::check())
                                    <li>
                                        <a href="{{ route('books.create')}}">Add a New Book</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('books.create')}}">Add a New Genre</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Authors</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">Authors</h5>
                            <ul class="list-unstyled books-menu-item">
                                <li>
                                    <a href="#">All Authors</a>
                                </li>
                                <li>
                                    <a href="#">Recently Added Authors</a>
                                </li>
                                <li>
                                    <a href="#">Most Popular Authors</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">Publishers</h5>
                            <ul class="list-unstyled books-menu-item">
                                <li>
                                    <a href="#">All Publishers</a>
                                </li>
                                <li>
                                    <a href="#">Recently Added Publishers</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-white mt-2 ml-2">
                                <i class="fa fa-user"></i>
                                Members Only
                            </h5>
                            <ul class="list-unstyled books-menu-item">
                                @if (@Auth::check())
                                    <li>
                                        <a href="{{ route('authors.create')}}">Add a New Author</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('authors.create')}}">Add a New Publisher</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

        </ul>


        <div class="btn-group dropleft">
            @if (Auth::check())
                <button class="dropdown-toggle nav-link text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:1px solid orange;border-radius:5px;">

                    <img src="/{{ Auth::user()->icon }}" class="rounded-circle" id="user-icon">

                     {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu user-menu">
                    <div class="user-menu-header">

                            <img src="/{{ @Auth::user()->icon }}" class="rounded-circle" id="user-icon" style="width:80px;height:80px;margin:10px;border:3px solid white;">

                            <div class="text-center text-white mb-2 font-bold">{{ @Auth::user()->name }}&nbsp;{{ @Auth::user()->last_name }} </div>


                    </div>
                  <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">My Profile</a>
                  <a class="dropdown-item" href="">My Favorite Books</a>
                  <a class="dropdown-item" href="">My Favorite Authors</a>
                  <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            @else
                <a href="/register" class="nav-link text-white">Register</a>
                <a href="{{ Route('login') . '?previous=' . Request::fullUrl() }}" class="nav-link text-white">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Login
                </a>
            @endif
        </div>
    </div>
</nav>
<!--/.Navbar-->
