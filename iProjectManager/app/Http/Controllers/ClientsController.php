<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clients = Client::allOrSearch( 'name', $search )->paginate(10);
        return view('clients.index', compact('clients') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClientRequest $clientRequest)
    {
        Client::create($clientRequest->all());
        session()->flash('flash_message', 'Cliente Cadastrado com sucesso');

        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Client $client, ClientRequest $clientRequest )
    {
        $client->update( $clientRequest->all() );

        session()->flash('flash_message', 'Cliente alterado com sucesso');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Client $client)
    {

        if ( $client->projects->count() > 0 ) {
            session()->flash('flash_message', 'Cliente não pode ser removido, pois tem projetos associados');
        } else {
            $client->delete();
            session()->flash('flash_message', 'Cliente removido com sucesso');
        }

        return redirect('clients');


    }
}
