@extends('app')

@section('htmlheader_title')
    Editar um Cliente
@endsection

@section('contentheader_title')
    Editar um Cliente
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editando {{ $client->name }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($client, ['action' => ['ClientsController@update', $client->id], 'method' => 'PUT', 'class' => 'form-horizontal'] )  !!}
                @include ('clients.form', ['submitBtnText' => 'Editar'])
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
