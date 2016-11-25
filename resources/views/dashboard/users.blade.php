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

				<p class="lead">Добавить нового пользователя</p>
			<form class="form-horizontal" method="post"
						action="{{ action('Dashboard\IndexController@store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="inputName" class="col-sm-2 control-label">Имя</label>

					<div class="col-sm-3">
						<input type="text" class="form-control" id="inputName"
									 placeholder="Имя" name="name">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>

					<div class="col-sm-3">
						<input type="email" class="form-control" id="inputEmail"
									 placeholder="E-mail" name="email">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPass" class="col-sm-2 control-label">Password</label>

					<div class="col-sm-3">
						<input type="password" class="form-control" id="inputPass"
									 placeholder="Пароль" name="password">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Добавить</button>
					</div>

				</div>
			</form>

		</div>
		<div class="col-md-2"></div>
	</div>

	<hr>
	<div class="container">

		<p class="lead">Всего пользователей:
			{{ $users->total() }}
		</p>


		<table class="table" id="tableItems">
			<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>E-mail</th>
				<th>Дата регистрации</th>
				<th>Последний вход</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>
					<td>{{$user->updated_at}}</td>

					<td>
						<form method="get" action=" {{ action('Dashboard\IndexController@edit', ['id' => $user->id]) }}">
							<input type="submit" class="btn btn-primary" value="Редакт."></input>
						</form>
					</td>

					<td>
						<form method="post" action=" {{ action('Dashboard\IndexController@destroy', ['id' => $user->id]) }}">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<input type="submit" class="btn btn-danger" value="Удал."></input>
						</form>
					</td>

					{{--<td>--}}
					{{--<a href=''--}}
					{{--data-action="{{ action('Dashboard\IndexController@destroy', ['id' => $user->id]) }}"--}}
					{{--class="destroy">--}}
					{{--<span class="glyphicon glyphicon-remove"--}}
					{{--aria-hidden="true">--}}
					{{--</span>--}}
					{{--</a>--}}
					{{--</td>--}}


				</tr>
			@endforeach
			</tbody>
		</table>


		<form id="delete-form" method="post" action="">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<button type="submit"></button>
		</form>

		{{ $users->links() }}



	</div>

@endsection