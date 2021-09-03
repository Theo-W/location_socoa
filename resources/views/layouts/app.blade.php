<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{!!  Vite::asset('/js/main.jsx', ['react']) !!}
@livewireStyles

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('calendar') ? 'active' : '' }}"
                       href="{{ route('calendar') }}">
                        <img src="{{ asset('img/icon/calendar.svg') }}" width="18" alt="">
                        {{ __('layout/nav.calendar') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('reservation') ? 'active' : '' }}"
                       href="{{ route('reservation') }}"> <img src="{{ asset('img/icon/ticket.svg') }}" width="18"
                                                               alt=""> {{ __('layout/nav.reservation') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('customer') ? 'active' : '' }}"
                       href="{{ route('customer') }}"> <img src="{{ asset('img/icon/user.svg') }}" width="18"
                                                            alt=""> {{ __('layout/nav.customer') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav d-flex">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="nav-link" class="nav-link" role="button">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <div>
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
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

<main class="container mt-3">
    @include('layouts.flash_message')
    @yield('content')
    @livewireScripts
    @stack('scripts')
</main>
</body>
</html>
