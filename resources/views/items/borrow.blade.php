@extends('layouts.app')

@section('view', 'item-create')

@section('content')

<div class="container">

	<h1>Půjčení položky {{ $item->title }}</h1>

	<form method="POST" action="{{ action('ItemsController@sendBorrow', $item) }}">

	  {{ csrf_field() }}

		<div class="form-group">
			<label for="message">Zpráva pro příjemce</label>
			<textarea type="password" class="form-control" id="message" name="message" placeholder="Popis"></textarea>
		</div>

		<button type="submit" class="btn btn-default">Odeslat</button>

	</form>

	@if (count($errors) > 0)
		<div class="alert alert-danger item-create-view__errors">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

</div>

@endsection