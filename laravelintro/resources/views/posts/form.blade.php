<div class="form-group">
    {!! Form::label('title', 'Title: ') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body: ') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('user_id', 'Autor: ') !!}
	{!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitBtn, ['class' => 'btn btn-primary form-control']) !!}
</div>