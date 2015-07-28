@extends('app')

@section('htmlheader_title')
    Tareja {{ $task->title }}
@endsection

@section('contentheader_title')
    Detalhamento da Tarefa
    <a href="{{ action('TasksController@edit', $task->id) }}" class="btn btn-primary">Editar</a>
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="invoice">
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-tasks"></i> {{ $task->title }}
                    <small class="pull-right">Tarefa Criada em: {{ $task->created_at->format('d/m/Y à\s H:i:s') }} por {{ $task->owner->name }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-6">
                <h4>Projeto {{$task->project->title }}</h4>
                <p class="text-muted no-shadow" style="margin-top: 10px;">
                    {!! $task->project->description !!}
                </p>
                <h4>Descrição da Tarefa</h4>
                <p class="text-muted no-shadow" style="margin-top: 10px;">
                    {!! $task->description !!}
                </p>

                <h4>Informações</h4>
                <p><strong>Status:</strong>
                    @if ( $task->status == App\Task::PENDING)
                        <span class="label label-warning">Pendente</span>
                    @else
                        <span class="label label-success">Finalizada</span>
                    @endif
                </p>
                <p><strong>Deadline:</strong> {{ $task->formated_deadline }}</p>
            </div>


            <div class="col-xs-6 table-responsive">
                <h4>Responsáveis pela Tarefa</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $task->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-xs-12">
                <br/>
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">Discussão</h3>
                    </div>
                    <div class="slimScrollDiv" style=""><div class="box-body chat" id="chat-box" style="">
                            @foreach( $task->comments as $comment )
                                <!-- chat item -->
                                <div class="item">
                                    <img src="{{ Gravatar::src( $comment->user->email ) }}" alt="user image" class="online">
                                    <p class="message">
                                        <a href="#" class="name">
                                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $comment->updated_at->format('d/m/Y h:i:s') }}</small>
                                            {{ $comment->user->name }}
                                        </a>
                                        {!! $comment->comment !!}
                                    </p>
                                    <a href="{{ action('CommentsController@edit', $comment->id) }}" class="btn btn-info">Editar</a>
                                    {!! Form::open( [ 'action' => ['CommentsController@destroy', $comment->id], 'method' => 'delete', 'style' => 'display:inline' ] ) !!}
                                    {!! Form::submit('Deletar', ['class' => 'btn btn-danger no-submit', 'data-toggle' => "modal", 'data-target' => ".modal-danger"]) !!}
                                    {!! Form::close() !!}
                                </div><!-- /.item -->
                            @endforeach
                        </div>

                    <div class="box-footer">
                        <br />
                        <div id="commentForm">
                            @if ( Session()->has('commentToEdit') )
                                <h4>Editando Comentário</h4>
                                {!! Form::open(['action' => ['CommentsController@update', Session()->get('commentToEdit')->id], 'method' => 'PUT' ]) !!}

                                {!! Form::textarea('comment', Session()->get('commentToEdit')->comment, ['class' => 'form-control textarea']); !!}

                                <br />
                                {!! Form::submit('Editar Comentário', ['class' => 'btn btn-primary']); !!}

                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['action' => ['CommentsController@store', Auth::user()->id, $task->id] ]) !!}

                                {!! Form::textarea('comment', null, ['class' => 'form-control textarea']); !!}

                                <br />
                                {!! Form::submit('Comentar', ['class' => 'btn btn-primary']); !!}

                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>


            </div>


            <!-- /.col -->
        </div>

        <!-- /.row -->

    </section><!-- /.content -->
    <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
@endsection
