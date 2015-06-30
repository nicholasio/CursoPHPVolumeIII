@extends('app')

@section('content')
	<h1>Editar: {{ $post->title }}</h1>

	<hr />

	{!! Form::model($post, ['method' => 'PUT', 'action' => ['PostsController@update', $post->id] ]) !!}
		@include ('posts.form', ['submitBtn' => 'Editar Post'])
	{!! Form::close() !!}

	@include ('errors.errors')

@stop
