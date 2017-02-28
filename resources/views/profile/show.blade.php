@extends('layout')

@section('view', 'profile-show')

@section('content')

<div class="profile">
	<div class="container">
		<div class="profile__actions">
			<a href="{{ action('ProfileController@edit') }}" class="profile__action">Edit profile</a>
			<a href="{{ action('ItemsController@create') }}" class="profile__action">Add item</a>
		</div>
		<div class="profile__info">
			<img src="images/drones.jpg" alt="" class="img-thumbnail img-fluid profile__image" />
			<div class="profile-field">
				<div class="profile-field__key">Name</div>
				<div class="profile-field__value">Ondřej Nývlt</div>
			</div>
			<div class="profile-field">
				<div class="profile-field__key">Born</div>
				<div class="profile-field__value">3. 1. 1998</div>
			</div>
		</div>
		<div class="profile__content">
			<div class="profile__borrowing"></div>
			<div class="profile__borrowed"></div>
		</div>
	</div>
</div>

@endsection