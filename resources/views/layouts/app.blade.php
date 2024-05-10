<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/css/style.css' , 'resources/js/app.js',
 'resources/js/PasswordChecks.js', 'resources/js/PreviewUploadPhoto.js',
  'resources/js/Likes.js', 'resources/js/CardComments.js'])

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container ">
            <div class="app-title">
                <a class="navbar-brand animated-link fw-bold" href="{{ url('/') }} ">
                    Devstagram On Laravel
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link animated-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ">
                                <a class="nav-link animated-link fw-bolder" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item mx-2">
                            <a href="{{ route('image.favorites') }}" class="nav-link animated-link"><strong>Favorites</strong></a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{ route('home') }}" class="nav-link animated-link"><strong>Home</strong></a>
                        </li>

                        <li class="nav-item mx-2">
                            <a href="{{ route('image.create') }}" class="nav-link animated-link"> <strong>Upload image</strong></a>
                        </li>

                        <li class="nav-item dropdown">
                            <div class="app-title">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle animated-link" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <strong>{{ Auth::user()->nickname }}</strong>
                                </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item animated-link " href="{{route('user.profile', ['user_id' => Auth::user()])}}">
                                    My Profile
                                </a>

                                <a class="dropdown-item animated-link" href="{{ route('user.edit-profile') }}">
                                    Edit Profile
                                </a>

                                <a class="dropdown-item animated-link-logout" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </div>
                        </li>
                        @if(Auth::user()->image)
                            <li class="nav-item ">
                                <a href="{{ route('user.edit-profile') }}">
                                    @component('components.images.profile_image', [
                                        'user' => Auth::user()])
                                    @endcomponent
                                </a>
                            </li>
                        @endif

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
