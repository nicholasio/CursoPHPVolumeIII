@extends('app')

@section('htmlheader_title')
    Projetos
@endsection

@section('contentheader_title')
    Projetos Cadastrados
    @if ( Auth::user()->is_admin )
        <a href="{{ url('projects/create') }}" class="btn btn-primary">Criar Novo</a>
    @endif
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Projetos</h3>

                    @include('partials.search')

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Description</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $projects as $project )
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title  }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->created_at->format('d/m/Y à\s H:i:s') }}</td>
                                <td>
                                        <a href="{{ action('ProjectsController@show', $project->id) }}" class="btn btn-info">Ver</a>
                                    @if ( Auth::user()->is_admin )
                                        <a href="{{ action('ProjectsController@edit', $project->id) }}" class="btn btn-info">Editar</a>

                                        {!! Form::open( [ 'route' => ['projects.destroy', $project->id], 'method' => 'delete', 'style' => 'display:inline' ] ) !!}
                                        {!! Form::submit('Deletar', ['class' => 'btn btn-danger no-submit', 'data-toggle' => "modal", 'data-target' => ".modal-danger"]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $projects->render() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
