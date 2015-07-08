@extends('app')

@section('htmlheader_title')
    Editando um Projeto
@endsection

@section('contentheader_title')
    Editando um Projeto
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editando Projeto {{ $project->title }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($project, ['action' => ['ProjectsController@update', $project->id], 'method' => 'PUT','class' => 'form-horizontal'] )  !!}
                @include ('projects.form', ['submitBtnText' => 'Editar'])
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
