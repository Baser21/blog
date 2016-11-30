@extends('admin.template.main')

@section('title', 'Visualizar Articulos')

@section('content')

    <!-- BUSCADOR DE ARTICULOS -->
    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}


    <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulo..' , 'aria-describedby' => 'search']) !!}
        <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

    </div>
    {!! Form::close() !!}

    <hr>
    <table class="table table-striped" >
        <thead>
        <th>ID</th>
        <th>Usuario</th>
        <th>Titulo</th>
        <th>Categoría</th>
        <th>Contenido</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($articles as $article)

            <tr>
                <td>{{ $article->id}}</td>
                <td> {{ $article->user->name }}</td>
                <td>{{ $article->title}}</td>
                <td>{{ $article->category->name}}</td>
                <td>{{ $article->content}}</td>
                <td>
                    <!-- Boton editar -->
                    <a href="{{route('articles.edit', $article->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                    <!-- Boton eliminar -->
                    <a href="{{route('articles.destroy', $article->id)}}" class="btn btn-warning" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text center">
    {!! $articles->render() !!}
    </div>
@endsection