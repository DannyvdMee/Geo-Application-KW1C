<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js" type="application/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
</head>
<body>
@yield('injectable-js')
<div id="app">
	<header>
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<p class="full-width display-inline-block text-center">{{ config('app.name') }}</p>
			<div id="power-button" class="position-absolute text-center">
				<a href="{{ route('logout') }}">
					<i class="material-icons">power_settings_new</i>
					<span class="display-block">@lang('messages.logout')</span>
				</a>
			</div>
		</nav>
	</header>
	<main class="py-4 teacher-background">
		@yield('content')
	</main>
	<footer>
		<div class="float-left display-inline-block">
			<a href="{{ route('teacher/route') }}">
				<i class="material-icons display-block">explore</i>
				<span class="display-block text-center">@lang('messages.routes')</span>
			</a>
		</div>
		<div class="float-left display-inline-block">
			<a href="{{ route('teacher/poi') }}">
				<i class="material-icons display-block">place</i>
				<span class="display-block text-center">@lang('messages.poi')</span>
			</a>
		</div>
		<div class="float-left display-inline-block">
			<a href="{{ route('teacher/student') }}">
				<i class="material-icons display-block">person</i>
				<span class="display-block text-center">@lang('messages.students')</span>
			</a>
		</div>
		<div class="float-left display-inline-block">
			<a href="{{ route('teacher/group') }}">
				<i class="material-icons display-block">group</i>
				<span class="display-block text-center">@lang('messages.groups')</span>
			</a>
		</div>
		<div class="float-left display-inline-block">
			<a href="{{ route('teacher/settings') }}">
				<i class="material-icons display-block">settings</i>
				<span class="display-block text-center">@lang('messages.settings')</span>
			</a>
		</div>
	</footer>
</div>
@yield('js-eventlisteners')
</body>
</html>