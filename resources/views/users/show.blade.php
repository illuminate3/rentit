@extends('layouts.app')

@section('view', 'profile-show')

@section('content')

<div class="container">
	<div class="card profile">
		@if ($user->image != null)
			<img src="{{ url($user->image) }}" alt="" class="image card__image profile__image" />
		@endif
		<div class="card__content">
			@if (Auth::user() == $user)
				<div class="profile__actions">
					<a href="{{ action('ProfileController@edit') }}" class="btn-btn-default">Upravit profil</a>
				</div>
			@endif
			<div class="profile__detail">
				<h1 class="profile__name">{{ $user->name }}</h1>
				<div class="profile__info-group">
					<div class="profile__key">Mail</div>
					<div class="profile__value">{{ $user->email }}</div>
				</div>
				@if ($user->adress != null)
					<div class="profile__info-group">
						<div class="profile__key">Adresa</div>
						<div class="profile__value">{{ $user->adress }}</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection