<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aprendendo Laravel</title>
    </head>
    <body>
        <h2>Listagem de Posts</h2>
        @foreach($posts as $post)
            <p>{{ $post }}</p>
        @endforeach
    </body>
</html>
