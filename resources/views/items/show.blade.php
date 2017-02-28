@extends('layouts.app')

@section('view', 'item-show')

@section('content')

<div class="item-detail">

	<div class="container">

		@if (Auth::user() == $item->user)
			<div class="item-detail__actions">
				<form method="post" action="{{ action('ItemsController@destroy', $item) }}">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Odstranit</button>
				</form>
			</div>
		@endif

		<div class="item-detail__name">{{ $item->title }}</div>
		<div class="item-detail__user">
			<div class="item-detail__user-name">{{ $item->user->name }}</div>
		</div>
		<img class="item-detail__image" src="{{ $item->image }}" />

	</div>

</div>

@endsection