<style type="text/css">

</style>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" alt="">
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
                    <i class="fa fa-book"></i>
                    Books</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/books">All Books</a>
                    <a class="dropdown-item" href="/ebooks">Ebooks</a>
                    <a class="dropdown-item" href="/physical-books">Physical Books</a>
                    <a class="dropdown-item" href="/audio-books">Audio Books</a>
                    @if (Auth::check())
                        <a class="dropdown-item" href="/books/create">
                            <span class="text-warning">
                                <i class="fa fa-pencil"></i>
                                Add More Books</span>
                        </a>
                    @endif

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pencil"></i>
                    Authors</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/authors">All Authors</a>
                    @if (Auth::check())
                        <a class="dropdown-item" href="/authors/create">
                            <span class="" style="background-color:yellow;">
                                <i class="fa fa-pencil"></i>
                                Add More Authors</span>
                        </a>
                    @endif

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bookmark"></i>
                    Types(Genres)</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/types">All Types</a>
                    @if (Auth::check())
                        <a class="dropdown-item" href="/types/create">
                            <span class="text-warning">
                                <i class="fa fa-pencil"></i>
                                Add a Type</span>
                        </a>
                    @endif
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag"></i>
                    Publishers</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/publishers">All Publishers</a>
                    @if (Auth::check())
                        <a class="dropdown-item" href="/publishers/create">
                            <span class="text-warning">
                                <i class="fa fa-pencil"></i>
                                Add a Publisher</span>
                        </a>
                    @endif
                </div>
            </li>
        </ul>


        <div class="btn-group">
            @if (Auth::check())
                <button class="dropdown-toggle nav-link text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:1px solid orange;border-radius:5px;">

                    <img src="{{ Auth::user()->icon }}" style="width:20px;height:20px;" class="rounded-circle" id="user-icon">

                     {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">My Profile</a>
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
