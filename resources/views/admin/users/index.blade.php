@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')

<hr>
<table class="table table-striped" >
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Tipo</th>	
		<th>Acción</th>
	</thead>	
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id}}</td>
			<td>{{ $user->name}}</td>
			<td>{{ $user->email}}</td>
			<td>
				@if($user->type == "admin")
				<span class="label label-danger">{{ $user->type}}</span>
				@else
				<span class="label label-primary">{{ $user->type}}</span>
				@endif
			</td>
			<td>
				<!-- Boton editar -->
				<a href="{{route('users.edit', $user->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
				<!-- Boton eliminar -->
				<a href="{{route('users.destroy', $user->id)}}" class="btn btn-warning" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $users->render() !!}
@endsection