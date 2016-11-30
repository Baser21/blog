@extends('admin.template.main')


@section('title', 'Editar articulo')

@section('content')

    {!!Form::open(['route' => ['articles.update', $article], 'method' => 'PUT'])!!}
    <div class="form-group">
        {!! Form::label('user', 'Usuario: ')!!}
        {!! Form::label('user', $article->user->name)!!}
    </div>

    <div class="form-group">
        {!!  Form::label('title', 'Titulo') !!}
        {!! Form::text('title', $article->title, ['class' => 'form-control', 'required'])!!}
    </div>

    <div class="form-group">
        {!!  Form::label('category_id', 'Categoría') !!}
        {!! Form::select('category_id' , $categories, $article->category->id , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::select('tags[]', $tags, $my_tags, ['class' => 'form-control select-tag', 'multiple' ,'required'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Contenido') !!}
        {!! Form::textarea('content', $article->content, ['class' => 'form-control textarea-content', 'required'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
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

