<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <!-- ========== ここからheader ========== -->
        <header>
            <div class="h-wrap">
                <h1 class="h-title h-left"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
                <ul class="h-right">
                    <!-- ↓ログインしていないとき(guestのとき) -->
                    @guest
                        <li class="h-item">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="h-item">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    <!-- ↓ログインしているとき -->
                    @else
                        <li class="h-item">
                            <p>{{ Auth::user()->name }}</p>
                            <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </header>
        <!-- ========== ここまでheader ========== -->

        <!-- ========== ここからmain ========== -->
        <main>
            @yield('content')
        </main>
        <!-- ========== ここまでmain ========== -->

        <!-- ========== ここからfooter ========== -->
        <footer>
            <div class="footer-inner">

            </div>
        </footer>
        <!-- ========== ここまでfooter ========== -->
    </body>
</html>
