<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class TaskRequest extends Request
{

    protected $task;

    public function __construct() {
        $this->task = null !== Route::current()->parameters()['tasks'] ? Route::current()->parameters()['tasks'] : null;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (
            $this->task->users->contains(Auth::user()->id)        || //Usuário faz parte da equipe responsável pela tarefa
            $this->task->project->manager->id == Auth::user()->id   || //Usuário é o gerente do projeto a qual esta tarefa pertence
            Auth::user()->is_admin //Usuário é admin
        );
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
            'project_id' => 'required|integer'
        ];
    }
}
