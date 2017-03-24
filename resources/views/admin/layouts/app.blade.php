<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('head')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Longform') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @show
</head>
<body>
    <div id="app">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas sidebar" id="sidebar">
                <ul class="sidenav">
                    <li>
                        <p class="text-center">
                            {{ Auth::user()->name }}
                            <br>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>


                    <li>&nbsp;</li>

                    <li>
                        <a href="{{ route('admin.home') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('post.create') }}">Write a Post</a>
                    </li>

                    <li>
                        <a href="{{ route('draft.index') }}">Your Drafts</a>
                    </li>

                    <li>&nbsp;</li>

                    <li>
                        <a href="{{ route('admin.user.index') }}">Authors</a>
                    </li>

                </ul>
            </div>

            <div class="page-body content-offcanvas">
                <div class="container-fluid">
                    @include('flash::message')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>
