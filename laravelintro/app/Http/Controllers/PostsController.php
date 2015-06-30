<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::lists('name', 'id');
        return view('posts.create', compact('users') );
    }

    public function store(PostRequest $request)
    {
        Post::create( $request->all() );

        session()->flash('flash_message', 'Seu Post foi Criado');
        return redirect('posts');
    }

    public function edit(Post $post)
    {
        $users = User::lists('name', 'id');
        return view('posts.edit', compact('post', 'users') );
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update( $request->all() );
        session()->flash('flash_message', 'Post Atualizado');
        return redirect('posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
}
