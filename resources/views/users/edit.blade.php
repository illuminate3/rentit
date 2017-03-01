@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Upravit profil</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ action('ProfileController@store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="adress" class="col-md-4 control-label">Adresa</label>

							<div class="col-md-6">
								<input id="adress" type="text" class="form-control" name="adress" value="{{ $user->adress }}">

								@if ($errors->has('adress'))
									<span class="help-block">
										<strong>{{ $errors->first('adress') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="image" class="col-md-4 control-label">Obrázek</label>

							<div class="col-md-6">
								<input id="image" type="file" name="image" accept="image/*" />

								@if ($errors->has('image'))
									<span class="help-block">
										<strong>{{ $errors->first('image') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Aktualizovat
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
