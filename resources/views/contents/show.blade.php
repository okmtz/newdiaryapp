<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>show contents</title>

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
            <h3 class="text-align-left mt-3 ml-3">{{ Auth::user()->name  }}</h3>
            <ul class="nav justify-content-end mr-5">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Login Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ action('ContentController@create') }}">Create Content</a>
                </li>
            </ul>
        </header>
        <div class="container mt-5">
            <div class="row row-cols-3">
            @foreach($contents as $content)
                <div class="col mb-6">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                        @php
                            $post = $content->posts()->orderBy('content', 'desc')->first();
                            $post= optional($post);
                        @endphp
                                {{ "latest posts : " . $post->updated_at }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $content->name }}</h5>
                            <p class="card-text">
                            {{ 'This is ' . $content->name  }} <br>
                            {{ 'now here are ' . $content->posts()->get()->count() . 'posts.' }}
                            </p>
                            <div class="text-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-secondary mr-1" onclick="location.href='{{action('PostController@index', ['id' => $content->id])}}'">Go</button>
                                    <form method="POST" action="{{ action('ContentController@destroy', $content) }}">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </body>
</html>