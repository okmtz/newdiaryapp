<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>posts contents</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <h5 class="text-align-left mt-3 ml-3">{{ $content->name }}</h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PostController@create', ['id' => $id]) }}">Create Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('ContentController@index') }}">Top Page </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row-cols-1 mt-5">
                @foreach( $posts as $post )
                <div class="card mb-2">
                    <div class="card-header">
                        <h4><a class="text-secondary" href="{{ action('PostController@show',$post->id) }}">{{ $post->title }}</a></h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>


