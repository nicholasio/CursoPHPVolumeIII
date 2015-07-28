<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class TaskRequest extends Request
{

    protected $task;
    protected $currentRoute;
    //protected $project_id;

    public function __construct()
    {
        $this->currentRoute = Route::current();
        $parameters = $this->currentRoute->parameters();
        $this->task = isset($parameters['tasks']) ? $parameters['tasks'] : null;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( $this->currentRoute->getName() == 'tasks.store' && $this->has('project_id') ) {
            $this->project_id = $this->input('project_id');
        } else {
            $this->project_id = null;
        }

        //Usuário está associado a tarefa
        if ( ! is_null($this->task) && $this->task->users->contains(Auth::user()->id) ) {
            return true;
        }
        //Usuário pode criar tarefa se estiver associado ao projeto
        else if (! is_null($this->project_id) && Project::find( $this->project_id )->users->contains(Auth::user()->id) ) {
            return true;
        } else if ( Auth::user()->is_admin ) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'project_id' => 'required|integer',
            'deadline' => 'date|required'
        ];
    }
}
