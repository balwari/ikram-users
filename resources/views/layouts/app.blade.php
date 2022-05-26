<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mendu</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet"> -->
    <style>
        .dropdown-toggle {
            cursor: pointer;
        }

        th {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 12px;
        }

        .logo .top-nav-cont {
            display: none;
            float: right;
            height: 0px;
        }

        .main .main-left-col .nav-cont ul li a {
            padding-left: 25px;
            border-bottom: 1px solid #F4F5F9;
        }

        .main .main-left-col .nav-cont ul li {
            padding-left: 0px;
        }

        a.active {
            background-color: #F4F5F9;
        }

        body {
            background: none;
        }

        .main .main-left-col .nav-cont ul li ul li a {
            padding-left: 40px;
            border-bottom: 1px solid #F4F5F9;
        }

        .nav-top {
            float: right;
            padding-top: 0.5%;
            margin-left: 15px;
        }

        .help-image {
            position: relative;
            top: 11px;
            right: 10px;
            width: 28px;
            height: auto;
            /* top:13px;
            left:110px;
            width:2%;
            height:48.8%; */
        }
    </style>
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <style>
        .overlay-timekeeper {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 10000;
            background: rgba(255, 255, 255, 0.8) url("{{ asset('images/Spinner-3.gif') }}") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay-timekeeper {
            display: block;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            margin-top: 10px;
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 30px;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f8f9fa;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .profile-span {
            height: 30px;

        }

        .main .main-right-col .main-cont {
            margin-left: 0px;
            margin-right: 0px;
        }

        .menu{
            font-size: 20px;
            margin-left: 20px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-light">
<div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="panel-body">
                        <img src="{{ asset('/images/logo.png') }}" style="width:50%;height:50%;">
                    </div>
                </a>
                @if(Auth::check())
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu" href="/show_users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu" href="/show_clients">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu" href="/show_vendors">Vendors</a>
                        </li>
                        <li class="nav-item dropdown">
                        <li class="nav-item">
                            <a class="nav-link menu" href="/show_projects">Projects</a>
                        </li>
                    </ul>
                    @endif
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>

</html>