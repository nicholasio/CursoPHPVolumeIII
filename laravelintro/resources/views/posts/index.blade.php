@extends('app')

@section('content')
    <h2>Listagem de Posts</h2>

    <table class="table table-striped">
        <tr>
            <th>
                Post
            </th>
            <th>
                Ações
            </th>
        </tr>

        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title}} </h1>
                <td>
                    <a class="btn btn-info" href="{{ action('PostsController@edit', ['id' => $post->id ]) }}">Editar</a>
                    <a class="btn btn-danger" href="{{ action('PostsController@destroy', ['id' => $post->id ]) }}">Deletar</a>
                </td>
            </tr>
        @endforeach

    </table>


    <a href="{{ action('PostsController@create') }}" class="btn btn-primary"> Adicionar Novo Post</a>
@stop
