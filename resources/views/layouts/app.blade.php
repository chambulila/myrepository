<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
  
   
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        ul li a, img {
         color: white;

        }

        #navbar {
            position: fixed;
            min-height: 100%;
            padding-top: 0px;
            margin-top: 0%;

        }

        #home {
            list-style: none;
            padding-top: 0%;
        }
        .icon{
            max-width: 30px;
            max-height: 30px;
        }

    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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

            <header>

                <div class="d-flex flex-column nav nav-stacked">

                    <div class="profile">
                        <div class="row">
                            <div class="col-2">
                                
                                <nav id="navbar" class="nav-menu navbar bg-dark">
                                
                                    <ul>
                                        <div>
                                            <img src="icon\Screenshot (24).png" class="rounded-circle" alt="Cinque Terre" width="95" height="100"> 
                                      </div>
                                        <li><a href="{{ url('/home') }}" class="nav-link scrollto"> <i class="fas fa-home"></i>
                                           Home</a>
                                        </li>
                                        <li><a href="{{ route('item.index') }}" class="nav-link scrollto"><i class="fa fa-times-circle"></i> 
                                                <span>item </span></a></li>
                                        <li><a href="{{ route('supplier.index') }}" class="nav-link scrollto"><i class="fa fa-user"></i> Suppliers</a></li>
                                        <!--i do sale moses-->
                                        <li><a href="{{ route('sale.create') }}" class="nav-link scrollto"><i class="fa fa-coins"></i>
                                                <span>sales</span></a></li>
                                        <li><a href="#" class="nav-link scrollto"><i class="fa fa-book"></i>
                                                <span>Report</span></a></li>
                                        <li><a href="{{ route('purchase.index') }}" class="nav-link scrollto"><i class="fa fa-toggle-off"></i>
                                                <span>Purchase</span></a></li>
                                    </ul>
                                </nav><!-- .nav-menu -->
                            </div>

                            <div class="col-10 ml-0 pl-0">

                                {{-- <h2 class="mb-4">Admin Dashboard</h2> --}}
                                @yield('content')
                            </div>

                        </div>

                    </div>


            </header><!-- End Header -->
        </main>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/sweetalert2.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
@yield('script')

</html>
