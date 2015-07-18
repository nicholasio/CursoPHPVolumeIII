@extends('app')

@section('htmlheader_title')
    Projetos | {{ $project->title }}
@endsection

@section('contentheader_title')
    Detalhamento do Projeto
    @if ( Auth::user()->is_admin )
        <a href="{{ action('ProjectsController@edit', $project->id) }}" class="btn btn-primary">Editar Projeto</a>
    @endif
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-suitcase"></i> {{ $project->title }}
                    <small class="pull-right">Cadastrado: {{ $project->created_at->format('d/m/Y à\s H:i:s') }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12">
                <h4>Cliente {{$project->client->name }}</h4>
                <p class="text-muted no-shadow" style="margin-top: 10px;">
                    {!! $project->client->description !!}
                </p>
                <h4>Descrição</h4>
                <p class="text-muted no-shadow" style="margin-top: 10px;">
                    {!! $project->description !!}
                </p>
            </div>

            <div class="col-xs-12 table-responsive">
                <h4>Equipe</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $project->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 table-responsive">
                <h4>Tarefas</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Título</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $project->tasks as $task )
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ( $task->status == App\Task::PENDING)
                                        <span class="label label-warning">Pendente</span>
                                    @else
                                        <span class="label label-success">Finalizada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ action('TasksController@show', $task->id) }}" class="btn btn-primary">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section><!-- /.content -->
    <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
@endsection
