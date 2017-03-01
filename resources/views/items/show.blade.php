@extends('layouts.app')

@section('view', 'item-show')

@section('content')

<div class="container">

	<div class="card item-detail">

	@if ($item->image !== null)
		<img class="image item-detail__image" src="{{ url($item->image) }}" />
	@endif

	<div class="card__content">

	<div class="row">
		<div class="col-md-4">
			<h2 class="item-detail__name">{{ ucfirst($item->title) }}</h2>
			<a href="{{ action('UserController@show', $item->user) }}">
				<div class="item-detail__user">{{ $item->user->name }}</div>
			</a>
			<div class="item-detail__price">{{ number_format($item->price, 0, ",", " ") }} Kč</div>
			<div class="item-detail__actions">
				@if (Auth::user() == $item->user)
					<form method="post" action="{{ action('ItemsController@destroy', $item) }}">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Odstranit</button>
					</form>
				@else
					<a href="{{ action('ItemsController@showBorrow', $item) }}" class="btn btn-default">Půjčit</a>
				@endif
			</div>
		</div>
		<div class="col-md-8">
			{{ $item->description }}
		</div>
	</div>

	</div>

	</div>

</div>

@endsection