<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KW1C Running App') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"
            type="application/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
</head>
<body>
<div id="app">

    <header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <p class="full-width text-center">{{ config('app.name', 'KW1C Running App') }}</p>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <div class="float-left display-inline-block">
            <a href="{{ route('map') }}">
                <i class="material-icons display-block">map</i>
                <span class="display-block text-center">@lang('messages.map')</span>
            </a>
        </div>
        <div class="float-right display-inline-block">
            <a href="{{ route('login') }}">
                <i class="material-icons display-block">person</i>
                <span class="display-block text-center">@lang('messages.login')</span>
            </a>
        </div>
    </footer>
</div>
</body>
</html>
