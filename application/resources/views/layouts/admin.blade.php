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

			<!-- Back button -->
			<div id="back-button" class="position-absolute text-center">
				<a style="cursor: pointer;">
					<i class="material-icons" onclick="window.history.back()">arrow_back_ios</i>
					<span class="display-block">Back</span>
				</a>		
			</div>

			<!-- Title -->
			<p class="full-width display-inline-block text-center">{{ config('app.name') }}</p>
			
			<!-- Logout button -->
			<div id="power-button" class="position-absolute text-center">
				<a href="{{ route('logout') }}">
					<i class="material-icons">power_settings_new</i>
					<span class="display-block">@lang('messages.logout')</span>
				</a>
			</div>

			<!-- WTF is dit? -->
			<!-- <div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					Left Side Of Navbar
					<ul class="navbar-nav mr-auto">

					</ul>

					Right Side Of Navbar
					<ul class="navbar-nav ml-auto">
						Authentication Links
						@guest
							<li><a class="nav-link" href="{{ route('login') }}">@lang('messages.login')</a></li>
							<li><a class="nav-link" href="{{ route('register') }}">@lang('messages.register')</a></li>
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
								   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										@lang('messages.logout')
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div> -->
			
		</nav>
	</header>

	<main class="py-4 teacher-background">
		@yield('content')
	</main>

	<footer>
		<div class="footer-icon-container display-inline-block">
			<div class="float-left display-inline-block">
				<a href="{{ route('admin/dashboard') }}">
					<i class="material-icons display-block text-center">home</i>
					<span class="display-block text-center"> <!-- @lang('messages.dashboard') --> Dashboard</span>
				</a>
			</div>
		</div>
	</footer>

	<!-- <footer>
		<div class="float-left display-inline-block">
			<a href="{{ route('map') }}">
				<i class="material-icons display-block">domain</i>
				<span class="display-block text-center">@lang('messages.departments')</span>
			</a>
		</div><div class="float-left display-inline-block">
			<a href="{{ route('admin/user') }}">
				<i class="material-icons display-block">person</i>
				<span class="display-block text-center">@lang('messages.users')</span>
			</a>
		</div>
		<div class="float-right display-inline-block">
			<a href="{{ route('admin/settings') }}">
				<i class="material-icons display-block">settings</i>
				<span class="display-block text-center">@lang('messages.settings')</span>
			</a>
		</div>
	</footer> -->
</div>
@yield('js-eventlisteners')
</body>
</html>
