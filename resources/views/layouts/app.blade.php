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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div id="app">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                @auth()
                @if(auth()->user()->role == 1)
                <li>
                    <a href="{{ route('home') }}" class="p-3">Home</a>
                </li>
                @endif
                @endauth
                @auth
                    @if(auth()->user()->role != 1)
                        <li>
                            <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                        </li>
                    @endif
                @endauth
                <li>
                    <a href="{{ route('contract') }}" class="p-3">Soglasje</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="/password/reset" class="p-3">{{ auth()->user()->name.' '.auth()->user()->surname }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">  <!--form uporabljen zaradi -> cross-site request forgery (CSRF) -->
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                @endguest
            </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
