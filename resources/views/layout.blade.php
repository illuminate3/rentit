<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="{{ config('app.description') }}" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>{{ config('app.name') }} | @yield('title', config('app.description'))</title>

		<link rel="stylesheet" href="{{ asset('styles/app.css') }}" />
	</head>
	<body>
		<div class="app">
			@yield('content')
		</div>
		<script src="{{ asset('scripts/app.js') }}"></script>
	</body>
</html>
