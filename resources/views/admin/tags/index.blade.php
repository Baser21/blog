@extends('admin.template.main')

@section('title', 'Lista de tags')

@section('content')


<!-- BUSCADOR DE TAGS -->
{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}


	<div class="input-group">		
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag..' , 'aria-describedby' => 'search']) !!}
		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

	</div>

{!! Form::close() !!}
<hr>
<table class="table table-striped" >
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Action</th>
	</thead>	
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<td>{{ $tag->id}}</td>
			<td>{{ $tag->name}}</td>	
			<td>
				<!-- Boton editar -->
				<a href="{{route('tags.edit', $tag->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
				<!-- Boton eliminar -->
				<a href="{{route('tags.destroy', $tag->id)}}" class="btn btn-warning" onclick="return confirm('¿Seguro que deseas eliminar este tag?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
			</td>	
		</tr>
		@endforeach
	</tbody>
</table>

{!! $tags->render() !!}
@endsection