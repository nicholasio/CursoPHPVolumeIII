@extends('app')

@section('htmlheader_title')
    Tarefas
@endsection

@section('contentheader_title')
    Tarefas
    <a href="{{ url('tasks/create') }}" class="btn btn-primary">Criar Nova Tarefa</a>
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tarefas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li href="#pending" class="active" data-toggle="tab" data-expanded="true"><a href="#">Pendentes</a></li>
                            <li href="#closed" data-toggle="tab" data-expanded="true"><a href="#">Entregues</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="pending">
                                @include('tasks.tasks-loop', ['tasks' => $tasksPending])
                            </div> <!-- #pending -->
                            <div class="tab-pane" id="closed">
                                @include('tasks.tasks-loop', ['tasks' => $tasksClosed])
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
