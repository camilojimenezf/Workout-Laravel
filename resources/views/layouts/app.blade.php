<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" >
    
        <nav style="height: 66px;" class="navbar  navbar-expand-md  navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2> Workout </h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('athlete.index') }}">{{ __('Athletes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plan.index') }}">{{ __('Plans') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.index') }}">{{ __('Profiles') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trainer.index') }}">{{ __('Trainers') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('training.index') }}">{{ __('trainings') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('routine.index') }}">{{ __('Routines') }}</a>
                        </li>

                    </ul>
                    @else

                     <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Acerca de') }}</a>
                    </li>
                
                     <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Clases') }}</a>
                    </li>
                     <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrenadores') }}</a>
                    </li>
                     <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Planes') }}</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Blog') }}</a>
                    </li>
                 


                    @endguest

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
                        @endif @else
                        <li class="nav-item">
                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('athlete.index')}}">{{ __('Admin') }}</a>
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