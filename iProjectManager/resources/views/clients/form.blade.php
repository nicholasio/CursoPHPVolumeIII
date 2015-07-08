<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', "Nome: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Cliente']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('description', "Descrição: ", ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => 'Descrição']) !!}
        </div>
    </div>


</div><!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit($submitBtnText, ['class' => 'btn btn-info pull-right']) !!}
</div><!-- /.box-footer -->