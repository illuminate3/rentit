@extends('layouts.app')

@section('view', 'item-index')

@section('content')

<div class="item-list">
	<div class="container">
		<div class="item-tile-container">
			@foreach($items as $item)
				<a class="item-tile" href="{{ action('ItemsController@show', $item) }}">
					<img class="image item-tile__image" src="{{ $item->image }}" />
					<div class="item-tile__name">{{ $item->title }}</div>
					<div class="item-tile__description">{{ $item->description }}</div>
				</a>
			@endforeach
		</div>
		<div class="item-index__pagination">
			{{ $items->links() }}
		</div>
	</div>
</div>

@endsection