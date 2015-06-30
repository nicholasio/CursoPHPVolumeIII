@extends('app')

@section('content')
    <h1>Escreva um novo Posts</h1>
    <hr />

    {!! Form::open(['url' => 'posts']) !!}
        @include('posts.form', ['submitBtn' => 'Adicionar Posts'] )
    {!! Form::close() !!}

    @include('errors.errors');
@stop
