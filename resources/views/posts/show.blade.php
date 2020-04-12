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
                <h5 class="text-align-left mt-3 ml-3">{{ "id : " . $post->id }}</h3>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('PostController@index', ['id' => $post->content_id]) }}">Post Top</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('ContentController@index') }}">Top Page </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container mb-5">
            <div class="row-cols-1 mt-5">
                <div class="btn-group mb-3" role="group">
                    <form method="POST" action="{{ action('PostController@edit', $post) }}">
                        @csrf 
                        @method('GET')
                        <button class="btn btn-default mr-2">Edit</button>
                    </form>
                    <form method="POST" action="{{action('PostController@destroy', $post)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default mr-2">delete</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span class="text-left"><h4>{{ $post->title }}</h4></span>
                        <div class="text-right">
                            <span class="mr-2">{{ "last modified " .$post->updated_at->format('Y年m月d日H時i分') }}</span>
                            <span>{{ "upload " . $post->created_at->format('Y年m月d日H時i分') }}</span>
                        </div>
                    </div>
                    <div class="card-body text-center">{{ $post->content }}</div>
                </div>
            </div>
            <div class="row row-cols-2 mt-5">
                <div class="accordion col-7" id="accordionExample">
                    @foreach($memos as $memo)
                        <div class="card">
                            <div class="card-header" id="{{ 'heading' . $memo->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{ '#collapse' . $memo->id }}" aria-controls="{{ 'collapse' .$memo->id }}">
                                        @php
                                            $memo_content = Illuminate\Support\Str::limit($memo->content,25);
                                        @endphp
                                        {{ $memo_content }}
                                    </button>
                                </h2>
                            </div>
                            <div id="{{ 'collapse' . $memo->id }}"class="collapse" aria-labelledby="{{ 'heading' . $memo->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ $memo->content }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card col-4 ml-3 px-0">
                    <div class="card-body text-center px-1 py-1">
                    <form method="POST" class="px-0 pt-0" action="{{action('MemoController@store')}}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea class="mx-0" style="min-width: 100%" rows=15 name="content" placeholder="メモを入力してください"></textarea>
                        <br>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
    </body>
</html>

