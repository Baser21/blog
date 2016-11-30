@extends('admin.template.main')

@section('title', 'Admin')


@section('content')



	<h1>{{$article->title}}</h1>
	<a href="" class="btn btn-success">Boton</a>
	

	<br><br>
	<hr>
	{{$article->content}}
	<hr>
	{{$article->user->name}} | {{$article->category->name}}
	<hr>
	@foreach($article->tags as $tag)
	{{$tag->name}}
	@endforeach

@endsection