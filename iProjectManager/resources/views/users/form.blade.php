<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', "Nome: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Usuário']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('email', "Email: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email do Usuário', $password]) !!}
        </div>
    </div>


    @if ( Route::current()->getName() != 'users.edit' )
        <div class="form-group">
            {!! Form::label('password', "Senha: ", ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>
    @endif

    @if ( Auth::user()->is_admin )
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('is_admin', '1') !!} Administrador
                    </label>
                </div>
            </div>
        </div>
    @endif

</div><!-- /.box-body -->
<div class="box-footer">
    @if ( Route::current()->getName() == 'users.edit' && Auth::user()->id == $user->id )
        <a href="{{ route('users.edit_password', $user->id) }}" class="btn btn-warning">Alterar Senha</a>
    @endif

    {!! Form::submit($submitBtnText, ['class' => 'btn btn-info pull-right']) !!}
</div><!-- /.box-footer -->