<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title">Responsáveis Pelo Projeto</h4>
</div>
{!! Form::model($task, ['action' => ['TasksController@storeUsers', $task->id], 'class' => 'form-horizontal'] )  !!}
<div class="modal-body">
        <div class="form-group">
            {!! Form::label('task_users', "Responsáveis: ", ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('task_users[]',$usersProject,  null , ['class' => 'form-control select2', 'multiple']) !!}
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-primary" value="Salvar" />
{!! Form::close() !!}