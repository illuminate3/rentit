<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="{{ config('app.description') }}" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>{{ config('app.name') }} | @yield('title', config('app.description'))</title>

		<link rel="stylesheet" href="{{ mix('styles/app.css') }}" />
	</head>
	<body>
		<div class="app">
			<div class="nav">
				<div class="container">
					<div class="nav__content">
						<a href="{{ action('HomeController@index') }}" class="nav__link">Úvod</a>
						<a href="{{ action('ProfileController@show') }}" class="nav__link">Profil</a>
						<a href="{{ action('ItemsController@index') }}" class="nav__link">Půjčovna</a>
						<a href="" class="nav__link">Kontakt</a>
					</div>
				</div>
			</div>
			<div class="app-content @yield('app-content-class', 'app-content--padded') @yield('view')-view">
				@yield('content')
			</div>
		</div>
		<script src="{{ mix('scripts/app.js') }}"></script>
	</body>
</html>
