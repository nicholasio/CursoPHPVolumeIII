<div class="box-body">
    <div class="form-group">
        {!! Form::label('title', "Nome do Projeto: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nome do Projeto']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('description', "Descrição: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => 'Descrição']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('manager_user_id', "Gerente de Projeto: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('manager_user_id', $manager_users, null, ['class' => 'form-control select2']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('client_id', "Cliente: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('client_id', $clients, null, ['class' => 'form-control select2']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('users_list', "Equipe: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('users_list[]', $users, null , ['class' => 'form-control select2', 'multiple']) !!}
        </div>
    </div>



</div><!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit($submitBtnText, ['class' => 'btn btn-info pull-right']) !!}
</div><!-- /.box-footer -->