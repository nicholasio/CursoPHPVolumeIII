<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Task;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($user, $task, CommentRequest $request)
    {
        Comment::create( [
            'user_id' => $user->id,
            'task_id' => $task->id,
            'comment' => $request->input('comment')
        ] );

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $commentToEdit
     * @return Response
     * @internal param Comment $comment
     * @internal param int $id
     */
    public function edit(Comment $commentToEdit)
    {
        return redirect( route('tasks.show', $commentToEdit->task->id) )->with( compact('commentToEdit') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Commment $comment
     * @param CommentRequest $commentRequest
     * @return Response
     * @internal param int $id
     */
    public function update(Comment $comment, CommentRequest $commentRequest)
    {
        $comment->update( $commentRequest->all() );

        session()->flash('flash_message', 'Comentário atualizado com sucesso');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        session()->flash('flash_message', 'Comentário removido');

        return redirect()->back();
    }
}
