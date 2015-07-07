@extends('app')

@section('htmlheader_title')
    Clientes | {{ $client->name }}
@endsection

@section('contentheader_title')
    Detalhamento de Cliente
    @if ( Auth::user()->is_admin )
        <a href="{{ action('ClientsController@edit', $client->id) }}" class="btn btn-primary">Editar Cliente</a>
    @endif
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $client->name }}
                    <small class="pull-right">Cadastrado: {{ $client->created_at->format('d/m/Y à\s H:i:s') }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12">
                <h4>Descrição</h4>
                <p class="text-muted no-shadow" style="margin-top: 10px;">
                    {!! $client->description !!}
                </p>
            </div>

            <div class="col-xs-12 table-responsive">
                <h4>Projetos</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Projeto</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $client->projects as $project)
                        <tr>
                            <td> {{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{!! $project->description !!}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Ver Projeto</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 invoice-col">
                Usuários trabalhando para esse cliente
                <ul>
                    <li>Nícholas</li>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section><!-- /.content -->
    <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
@endsection
