@extends('layouts.app')

@section('view', 'item-create')

@section('content')

<div class="container">

	<form method="POST" action="{{ action('ItemsController@store') }}" enctype="multipart/form-data"
		class="item-create-view__form">

	  {{ csrf_field() }}

		<div class="form-group">
			<label for="title">Název</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Název">
		</div>

		<div class="form-group">
			<label for="description">Popis</label>
			<textarea type="password" class="form-control" id="description" name="description" placeholder="Popis"></textarea>
		</div>

		<div class="form-group">
			<label for="category">Kategorie</label>
			<select class="form-control" id="category" name="category_id">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="image">Obrázek</label>
			<input type="file" name="image" accept="image/*" />
		</div>

		<button type="submit" class="btn btn-default">Přidat</button>

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