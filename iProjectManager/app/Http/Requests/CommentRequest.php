<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CommentRequest extends Request
{
    protected $user;

    protected $task;

    protected $comment;

    public function __construct()
    {
        $paramenters = Route::current()->parameters();
        $this->user = isset($paramenters['users']) ? $paramenters['users'] : null;
        $this->task = isset($paramenters['tasks']) ? $paramenters['tasks'] : null;
        $this->comment = isset($paramenters['comments']) ? $paramenters['comments'] : null;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( Route::current()->getName() == 'comments.store') {
            if ( ! is_null($this->user) && ! is_null($this->task) ) {
                return Auth::user()->id == $this->user->id && ( $this->user->is_admin || $this->task->project->users->contains($this->user->id) );
            }
        } else {
            if ( ! is_null($this->comment) ) { //Edit, Delete and Update Methods
                return Auth::user()->is_admin || $this->comment->user->id == Auth::user()->id;
            }
        }


        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|min:3'
        ];
    }
}
