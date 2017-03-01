@extends('layouts.app')

@section('app-content-class', '')

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

<div class="intro-categories">
	<div class="container">
		<div class="block-grid intro-categories">
			@foreach($categories as $category)
				<a class="block-grid__item intro-category" href="{{ action('ItemsController@categoryIndex', $category) }}">
					<img class="image intro-category__image" src="{{ url('images/categories/' . $category->name . '.jpg') }}" alt="">
					<div class="intro-category__overlay"></div>
					<h3 class="intro-category__content">{{ $category->name }}</h3>
				</a>
			@endforeach
		</div>
	</div>
</div>

@endsection
