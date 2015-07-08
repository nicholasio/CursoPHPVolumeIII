@extends('app')

@section('htmlheader_title')
    Usuários
@endsection

@section('contentheader_title')
    Usuários
    @if ( Auth::user()->is_admin )
        <a href="{{ url('users/create') }}" class="btn btn-primary">Criar Novo</a>
    @endif
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Usuários Cadastrados</h3>

                    @include('partials.search')

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $users as $user )
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name  }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ( $user->is_admin )
                                            <span class="label label-success">Sim</span>
                                        @else
                                            <span class="label label-warning">Não</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y à\s H:i:s') }}</td>
                                    <td>
                                        @if ( $user->id == Auth::user()->id || Auth::user()->is_admin )
                                            <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-info">Editar</a>
                                        @endif

                                        @if ( Auth::user()->is_admin )
                                            {!! Form::open( [ 'route' => ['users.destroy', $user->id], 'method' => 'delete', 'style' => 'display:inline' ] ) !!}
                                                {!! Form::submit('Deletar', ['class' => 'btn btn-danger no-submit', 'data-toggle' => "modal", 'data-target' => ".modal-danger"]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
