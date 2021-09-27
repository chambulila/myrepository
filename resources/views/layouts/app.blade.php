<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
                                        <li><a href="{{ url('/home') }}" class="nav-link scrollto"> <img src="icon\home-solid.svg" alt="" style="width: 25px">
                                           Home</a>
                                        </li>
                                        <li><a href="{{ route('item.index') }}" class="nav-link scrollto"><img src="icon\user-circle-regular.svg" alt="" style="width: 25px"> 
                                                <span>item </span></a></li>
                                        <li><a href="{{ route('supplier.index') }}" class="nav-link scrollto"><img src="icon\user-circle-regular.svg" alt="" style="width: 25px">Suppliers</a></li>
                                        <!--i do sale moses-->
                                        <li><a href="{{ route('sale.create') }}" class="nav-link scrollto"><img src="icon\coins-solid.svg" alt="" style="width: 25px">
                                                <span>sales</span></a></li>
                                        <li><a href="#" class="nav-link scrollto"><img src="icon\book-solid.svg" alt="" style="width: 25px" height="25px">
                                                <span>Report</span></a></li>
                                        <li><a href="{{ route('purchase.index') }}" class="nav-link scrollto"><img src="icon\dollar-sign-solid.svg" alt="" style="width:25px" height="29px" >
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
@yield('script')

</html>
