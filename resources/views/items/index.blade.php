@extends('layout')

@section('content')

<div class="item-list">
	<div class="container">
		<div class="item-list-container">
			@foreach($items as $item)
				<div class="item-tile">
					<img class="item-tile__image" src="{{ $item->image }}" />
					<div class="item-tile__name">{{ $item->title }}</div>
					<div class="item-tile__description">{{ $item->description }}</div>
				</div>
			@endforeach
			{{ $items->links() }}
		</div>
	</div>
</div>

@endsection