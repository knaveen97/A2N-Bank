<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>A2N Bank</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    A2N Bank
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @guest
            @else
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('home') ? 'nav-link active' : 'nav-link' }}" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('accounts') ? 'nav-link active' : 'nav-link' }}" href="{{ route('accounts')}}">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('transactions') ? 'nav-link active' : 'nav-link' }}" href="{{ route('transactions') }}">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('transfers') ? 'nav-link active' : 'nav-link' }}" href="{{ route('transfers') }}">Transfers</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('billpayments') ? 'nav-link active' : 'nav-link' }}" href="{{ route('billpayments') }}">Bill Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::currentRouteNamed('profile') ? 'nav-link active' : 'nav-link' }}" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                    </li>
                </ul>
                @include('layouts.flash-message')
            </div>
            @endguest
            
            @yield('content')
        </main>
    </div>
</body>

</html>