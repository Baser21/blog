@extends('admin.template.main')

@section('title', 'Editar Usuario')

@section('content')

	{!! Form::open(['route' => ['users.update', $user] , 					'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name', 'Nombre') !!}
		{!! Form::text('name', $user->name , ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', 'Correo Electronico') !!}
		{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@example.com', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('type', 'Tipo') !!}
		@if($user->type == 'member')
			{!! Form::select('type' , ['member' => 'Miembro' , 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
		@elseif($user->type == 'admin')
			{!! Form::select('type' , ['admin' => 'Administrador','member' => 'Miembro' ], null, ['class' => 'form-control']) !!}
		@endif

	</div>

	<div class="form-group">
	{!! Form::submit( 'Guardar', ['class' => 'btn btn-primary'] )!!}
	</div>

	{!! Form::close() !!}
@endsection