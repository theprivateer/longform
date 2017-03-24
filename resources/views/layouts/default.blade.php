<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('head')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ meta_title() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @include('laravel-feed::feed-links')
    @show
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Longform') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="site-footer">
            <ul class="list-inline">
                <li>&copy; {{ config('app.name', 'Longform') }}</li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @if(env('REGISTRATIONS', true))
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li><a href="{{ route('admin.home') }}">Admin</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </footer>
    </div>

    @section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>
