@extends('app')

@section('htmlheader_title')
    Criar um Novo Usuário
@endsection

@section('contentheader_title')
    Criar um Novo Usuário
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Preencha os campos para adicionar um novo Cliente</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( ['url' => 'clients', 'class' => 'form-horizontal'] )  !!}
                @include ('clients.form', [ 'submitBtnText' => 'Adicionar' ])
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
