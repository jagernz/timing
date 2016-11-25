@extends('layouts.dashboard')
@section('content')
	<br>
	<br>
	<hr>

	<div class="row">
		<div class="col-md-10">



			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-horizontal" method="post"
						action="{{ action('Dashboard\IndexController@update', ['id' => $user[0]['id']]) }}">
				{{ method_field('PUT') }}
				{{ csrf_field() }}

				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Имя</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="inputName"
									 placeholder="Имя" name="name" value="{{ $user[0]['name'] }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-3">
						<input type="email" class="form-control" id="inputEmail"
									 placeholder="E-mail" name="email" value="{{ $user[0]['email'] }}">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPass" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="inputPass"
									 placeholder="Введите новый пароль" name="password" value="">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Обновить</button>
					</div>

				</div>
			</form>


		</div>
		<div class="col-md-5"></div>
	</div>

@endsection