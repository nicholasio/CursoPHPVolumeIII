<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostsTableSeeder extends Seeder {

    public function run() {
        Post::create( [
            'title' => 'Notícia 1',
            'body'  => 'Lorem Ipsum Dolor Sit Amet',
            'user_id' => 1
        ]);

        Post::create( [
            'title' => 'Notícia 2',
            'body'  => 'Lorem Ipsum Dolor Sit Amet',
            'user_id' => 1
        ]);
    }

}
