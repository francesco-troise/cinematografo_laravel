<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--bootstrap's icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="bg-light min-vh-100"> <!-- Sfondo grigio chiarissimo tecnico -->

        <!-- Navbar: Passiamo a navbar-dark con bg-dark per un look "Terminal/Code" più moderno -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg py-2">
            <div class="container">

                <!-- Logo e Testo aggiornati -->
                <a class="navbar-brand d-flex align-items-center fw-bold text-uppercase tracking-wider"
                    href="{{ url('/') }}">
                    <div class="logo_laravel me-2" style="height: 50px; width: 50px;">
                        <img src="{{ Storage::url('images/logo.png') }}" alt="logo" class="img-fluid rounded-circle"
                            style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <span class="text-white">PonyMovie</span><span class="text-primary ms-1">Manager</span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link px-3 fw-semibold active" href="{{ url('/') }}">
                                <i class="bi bi-house-door me-1"></i> {{ __('Home') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ms-md-2">
                                    <a class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold"
                                        href="{{ route('register') }}">
                                        {{ __('Get Started') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown bg-secondary bg-opacity-25 rounded-3 px-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-bold" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <span class="text-info">@</span>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 p-2 rounded-4"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item rounded-3 py-2" href="{{ url('index') }}">
                                        <i class="bi bi-speedometer2 me-2 text-primary"></i>{{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item rounded-3 py-2" href="{{ url('profile') }}">
                                        <i class="bi bi-person me-2 text-primary"></i>{{ __('Profile') }}
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item rounded-3 py-2 text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
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

        <!-- Main content con padding e animazione fade-in ideale -->
        <main class="py-5 container">
            <div class="row justify-content-center">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
