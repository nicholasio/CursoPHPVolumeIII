@extends('app')

@section('htmlheader_title')
    Projetos
@endsection

@section('contentheader_title')
    Projetos Cadastrados
    <a href="{{ url('projects/create') }}" class="btn btn-primary">Criar Novo</a>
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Projetos</h3>

                    <div class="box-tools">

                        <div class="input-group">
                            <input type="text" placeholder="Search" style="width: 150px;"
                                   class="form-control input-sm pull-right" name="table_search">

                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
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

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
