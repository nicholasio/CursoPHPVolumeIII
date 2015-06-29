<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index() {
        $posts = ['Post 1', 'Post 2'];
        return view('posts.index')->with('posts', $posts);
    }
}
