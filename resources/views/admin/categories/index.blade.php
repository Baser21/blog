@extends('admin.template.main')

@section('title', 'Lista de categorias')

@section('content')

<hr>
<table class="table table-striped" >
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Action</th>
	</thead>	
	<tbody>
		@foreach($categories as $category)
		<tr>
			<td>{{ $category->id}}</td>
			<td>{{ $category->name}}</td>	
			<td>
				<!-- Boton editar -->
				<a href="{{route('categories.edit', $category->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
				<!-- Boton eliminar -->
				<a href="{{route('categories.destroy', $category->id)}}" class="btn btn-warning" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
			</td>	
		</tr>
		@endforeach
	</tbody>
</table>

{!! $categories->render() !!}
@endsection