@extends('app')

@section('htmlheader_title')
    Criar uma Nova Tarefa
@endsection

@section('contentheader_title')
    Criar uma Nova Tarefa
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Defina o Projeto e Detalhes da Tarefa</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::model( $task, ['action' => ['TasksController@update', $task->id], 'class' => 'form-horizontal', 'method' => 'PUT'] )  !!}
                @include ('tasks.form', ['submitBtnText' => 'Salvar'])

            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
