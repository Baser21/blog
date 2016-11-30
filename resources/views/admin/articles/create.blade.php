@extends('admin.template.main')

@section('title', 'Crear Articulo')

@section('content')
<!-- Para que el formulario permita enviar archivos -->
{!! Form::open(['route' => 'articles.store' , 'method' => 'POST', 'files' => true]) !!}

<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '', 'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Categoría') !!}
	{!! Form::select('category_id', $categories , null, ['class' => 'form-control select-category', 'required', 'placeholder' => 'Seleccione una opcion'])!!}
</div>

<div class="form-group">
	{!! Form::label('tags', 'Tags') !!}
	{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple' ,'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('content', 'Contenido') !!}
	{!! Form::textarea('content', null, ['class' => 'form-control textarea-content', 'required', 'placeholder' => 'Contenido...'])!!}
</div>

<div class="form-group">
	{!! Form::label('image', 'Imagen') !!}
	{!! Form::file('image', null, ['class' => 'form-control file-image'])!!}
</div>

<div class="form-group">
	{!! Form::submit('Agregar artículo', ['class' => 'btn btn-primary'] ) !!}
</div>

{!! Form::close() !!}
@endsection

@section('js')
<script>
	$('.select-tag').chosen({
		placeholder_text_multiple: 'Selecccione un máximo de 3 tags',
		max_selected_options: 3,
		no_results_text: 'No se encontraron tags coincidentes'
	});
</script>

	<script>
		$('.select-category').chosen({
		});
	</script>

<script>
	$('.textarea-content').trumbowyg({

	});
</script>

@endsection