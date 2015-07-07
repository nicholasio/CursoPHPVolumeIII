@extends('app')

@section('htmlheader_title')
    Alterar Senha
@endsection

@section('contentheader_title')
   Alterar Senha
@endsection


@section('main-content')
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editando senha de {{ $user->name }} ({{ $user->email }})</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open( ['action' => ['UsersController@password', $user->id], 'class' => 'form-horizontal', 'method' => 'POST' ] )  !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('old_password', "Senha Antiga: ", ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::password('old_password',['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', "Nova Senha: ", ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::password('password',['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', "Confirme a senha: ", ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit('Alterar Senha', ['class' => 'btn btn-info pull-right']) !!}
            </div><!-- /.box-footer -->
            {!! Form::close() !!}
        </div><!-- /.box -->
    </div>
@endsection
