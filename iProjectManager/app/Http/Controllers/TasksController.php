<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Project;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function __construct() {
        $this->middleware('permissions');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasksPending = Task::pending()->get();
        $tasksClosed  = Task::closed()->get();

        return view('tasks.index', compact('tasksPending', 'tasksClosed') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if ( Auth::user()->is_admin ) {
            $projects = Project::lists('title', 'id');
        } else {
            $projects = Auth::user()->projects->lists('title', 'id');
        }

        $users    = User::lists('name', 'id');
        return view('tasks.create', compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $taskRequest
     * @return Response
     */
    public function store(TaskRequest $taskRequest)
    {
        $data = $taskRequest->all();
        $data['creator'] = Auth::user()->id;

        $task = Task::create( $data );

        session()->flash('flash_message', 'Tarefa Criada com Sucesso');

        return redirect( action('TasksController@edit', $task->id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Response
     * @internal param int $id
     */
    public function edit(Task $task)
    {
        $projects = Project::lists('title', 'id');
        $users    = User::lists('name', 'id');

        $usersProject = $task->project->users()->lists('name', 'id')->put(  $task->project->manager->id,
                                                                            $task->project->manager->name );

        return view('tasks.edit', compact('task', 'users', 'projects', 'usersProject') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Task $task
     * @param TaskRequest $taskRequest
     * @return Response
     * @internal param int $id
     */
    public function update(Task $task, TaskRequest $taskRequest)
    {

        $wasOpened = false;

        if ( $task->status == Task::PENDING ) {
            $wasOpened = true;
        }

        $task->update( $taskRequest->all() );

        /**
         * Se houve mudança de status de pendente para fechado, configure a data de finalização
         */
        if ( $task->status == Task::CLOSED && $wasOpened) {
            $task->date_end = Carbon::now();
            $task->save();
        }


        if ( $taskRequest->input('task_users') ) {
            $task->users()->sync( $taskRequest->input('task_users') );
        } else {
            $task->users()->detach( $task->users->lists('id') );
        }

        session()->flash('flash_message', 'Tarefa Atualizada com Sucesso');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Task $task)
    {
        $task->users()->sync([]);
        $task->comments()->delete();

        $task->delete();

        session()->flash('flash_message', 'Projeto Removido com sucesso');

        return redirect('tasks');
    }
}
