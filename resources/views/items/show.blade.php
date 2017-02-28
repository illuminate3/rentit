@extends('layout')

@section('view', 'item-show')

@section('content')

<div class="item-detail">
	<div class="container">
		<div class="item-detail__name">{{ $item->title }}</div>
		<div class="item-detail__user">
			<div class="item-detail__user-name">{{ $item->user->name }}</div>
		</div>
		<img class="item-detail__image" src="{{ $item->image }}" />
	</div>
</div>

@endsection