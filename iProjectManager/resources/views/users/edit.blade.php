@extends('app')

@section('htmlheader_title')
    Editar um Usuário
@endsection

@section('contentheader_title')
    Editar um Usuário
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editando {{ $user->name }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($user, ['action' => ['UsersController@update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal'] )  !!}
                @include ('users.form', ['submitBtnText' => 'Editar', 'password' => 'readonly'])
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
