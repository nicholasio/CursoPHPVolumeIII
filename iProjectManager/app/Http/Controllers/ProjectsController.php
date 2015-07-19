<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ProjectRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permissions');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ( ! Auth::user()->is_admin ) {
            $projects =  Auth::user()->projects()->allOrSearch( 'title', $search )->paginate(10);
        } else {
            $projects = Project::allOrSearch( 'title', $search )->paginate(10);
        }



        return view('projects.index', compact('projects') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $manager_users      = User::IsAdmin()->get()->lists('name', 'id');
        $users              = User::lists('name', 'id');
        $clients            = Client::lists('name', 'id');

        return view('projects.create', compact('users', 'manager_users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProjectRequest $projectRequest)
    {
        $project = Project::create( $projectRequest->all() );

        if ( $projectRequest->input('users_list') ) {
            $project->users()->attach( $projectRequest->input('users_list') );
        }

        session()->flash('flash_message', 'Projeto Criado com Sucesso');

        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     * @internal param int $id
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Project $project)
    {
        $manager_users      = User::IsAdmin()->get()->lists('name', 'id');
        $users              = User::lists('name', 'id');

        $clients            = Client::lists('name', 'id');

        return view('projects.edit', compact('users', 'manager_users', 'clients', 'project') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Project $project, ProjectRequest $projectRequest)
    {
        $project->update( $projectRequest->all() );

        if ( $projectRequest->input('users_list') ) {
            $project->users()->sync( $projectRequest->input('users_list') );
        } else {
            $project->users()->detach( $project->users->lists('id') );
        }


        session()->flash('flash_message', 'Projeto Atualizado com sucesso');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->users()->detach($project->users->lists('id'));

        $project->delete();

        session()->flash('flash_message', 'Projeto Removido com sucesso');

        return redirect('projects');
    }
}
