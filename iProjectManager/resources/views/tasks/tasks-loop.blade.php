<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Início</th>
        <th>Deadline</th>
        <th>Data de Entrega</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $tasks as $task )
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->created_at->format('d/m/Y à\s H:i:s') }}</td>
            <td>{{ $task->deadline->format('d/m/Y') }}</td>
            <td>
                @if ( $task->status == App\Task::CLOSED )
                    {{ $task->date_end->format('d/m/Y') }}
                @else
                    Não entregue
                @endif
            </td>
            <td>
                <a href="{{ action('TasksController@show', $task->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ action('TasksController@edit', $task->id) }}" class="btn btn-info">Editar</a>
                <a data-content="{{ action('TasksController@showUsers', $task->id) }}" data-toggle="modal" data-target=".modal-default" class="btn btn-primary">Responsáveis</a>

                {!! Form::open( [ 'route' => ['tasks.destroy', $task->id], 'method' => 'delete', 'style' => 'display:inline' ] ) !!}
                {!! Form::submit('Deletar', ['class' => 'btn btn-danger no-submit', 'data-toggle' => "modal", 'data-target' => ".modal-danger"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

