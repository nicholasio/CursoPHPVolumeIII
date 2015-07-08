@extends('app')

@section('htmlheader_title')
    Clientes
@endsection

@section('contentheader_title')
    Clientes
    @if ( Auth::user()->is_admin )
        <a href="{{ url('clients/create') }}" class="btn btn-primary">Criar Novo</a>
    @endif
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Clientes Cadastrados</h3>

                    @include('partials.search')
                </div>

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $clients as $client )
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name  }}</td>
                                <td>{{ $client->description }}</td>
                                <td>

                                    <a href="{{ action('ClientsController@show', $client->id) }}" class="btn btn-primary">Ver</a>
                                    @if ( Auth::user()->is_admin )
                                        <a href="{{ action('ClientsController@edit', $client->id) }}" class="btn btn-info">Editar</a>
                                        {!! Form::open( [ 'route' => ['clients.destroy', $client->id], 'method' => 'delete', 'style' => 'display:inline'] ) !!}
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

                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $clients->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
