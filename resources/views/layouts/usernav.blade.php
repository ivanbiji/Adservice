<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Bree+Serif');
    </style>
</head>

<body class="backk">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="animated tada" href="{{ route('home') }}/ "><img class="" style="width:100px; margin-right:30px;" src="{{ asset('img/notag.png')}}"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-items-left justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('ad.add') }}">Post Ad</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}/ ">All</a>
                        <a class="dropdown-item" href="{{ route('home') }}/1 ">Books</a>
                        <a class="dropdown-item" href="{{ route('home') }}/2 ">Electronics</a>
                        <a class="dropdown-item" href="{{ route('home') }}/3 ">Vehicles</a>
                        <a class="dropdown-item" href="{{ route('home') }}/4 ">Others</a>
                    </div>

                </li>

            </ul>
            <ul class="navbar-nav ml-auto">



                <li class="nav-item dropdown cc">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}/user/{{ Auth::user()->id }} ">Your Ads</a>
                        <a class="dropdown-item" href="{{ route('home') }}/profile">Your Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="/ad/search">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search Ads" aria-label="Search" name="search">
                <button class="btn-custom" type="submit"><i class="large material-icons">search</i></button>
            </form>
        </div>

    </nav>


    <div class="container-fluid" style="padding-top:100px; padding-bottom:20px; min-height:95vh;">

        @yield('content')
    </div>

    <footer class="page-footer font-small bg-dark sticky-bottom sticky-bottom">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="color:white;">© 2018 Copyright DBMS Project NIT Calicut
            </div>
            <!-- Copyright -->
    
        </footer>

</body>

</html>
