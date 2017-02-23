@extends('layout')

@section('content')

<div class="intro background-image">
	<div class="intro__overlay"></div>
	<div class="intro__container">
		<div class="intro-text intro__content">
			<h1 class="intro-text__heading">Rentit</h1>
			<div class="intro-text__desc">{{ config('app.description') }}</div>
		</div>
	</div>
</div>

@endsection