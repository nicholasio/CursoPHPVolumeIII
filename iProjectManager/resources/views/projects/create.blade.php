@extends('app')

@section('htmlheader_title')
    Criar um Novo Projeto
@endsection

@section('contentheader_title')
    Criar um Novo Projeto
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Insira os detalhes do Projeto</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( ['url' => 'projects', 'class' => 'form-horizontal'] )  !!}
                @include ('projects.form', ['submitBtnText' => 'Adicionar'])
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
