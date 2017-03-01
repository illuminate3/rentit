@extends('layouts.app')

@section('view', 'profile-show')

@section('content')

<div class="container">
	<div class="card profile">
		<img src="images/drones.jpg" alt="" class="image card__image profile__image" />
		<div class="card__content">
			<h1 class="profile__name">{{ $user->name }}</h1>
		</div>
	</div>
</div>

@endsection