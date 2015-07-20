<div class="box-body">
    <div class="form-group">
        {!! Form::label('project_id', "Projeto: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('project_id', $projects, null, ['class' => 'form-control select2']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('title', "Título da Tarefa: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nome do Projeto']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('deadline', "Deadline: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', "Descrição: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => 'Descrição']) !!}
        </div>
    </div>

    @if ( Route::current()->getName() == 'tasks.edit' )
        <div class="form-group">
            {!! Form::label('task_users', "Responsáveis: ", ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('task_users[]',$usersProject,  null , ['class' => 'form-control select2', 'multiple']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('status', "Status: ", ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('status',['PEN' => 'Pendente', 'CLO' => 'Entregue'],  null , ['class' => 'form-control']) !!}
            </div>
        </div>
    @endif

</div><!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit($submitBtnText, ['class' => 'btn btn-info pull-right']) !!}
</div><!-- /.box-footer -->