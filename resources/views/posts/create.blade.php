<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>create post</title>

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
                <h5 class="text-align-left mt-3 ml-3">Create</h3>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PostController@index', ['id' => $content_id]) }}">Post Top</a>
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
                <form method="POST" action="{{ action('PostController@store') }}">
                    @csrf
                    <input type="hidden" name="content_id" value="{{ $content_id }}">
                    <div class="card">
                        <div class="card-header">
                            <input type="text" class="py-1" style="min-width: 100%" name="title" placeholder="タイトルを入力してください">
                        </div>
                        <div class="card-body text center">
                            <textarea class="py-1" style="min-width: 100%" name="content" placeholder="内容を入力してください"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>
                    <button type="button" class="btn btn-outline-success mt-3" onclick="location.href='{{ action('PostController@index', ['id' => $content_id]) }}'">Cancel</button>
                </form>
            </div>
        </div>
    </body>
</html>






