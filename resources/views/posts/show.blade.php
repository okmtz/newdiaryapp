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
            <h5 class="text-align-left mt-3 ml-3">{{ $post=id }}</h3>
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
    </body>
</html>

<a href="{{ action('PostController@edit', $post) }}">投稿を編集する</a>
<a href="{{ action('PostController@index', ['id' => $post->content_id]) }}">投稿の一覧に戻る</a>
<form method="POST" action="{{action('PostController@destroy', $post)}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
<p>title</p>
<p>{{$post->title}}</p>
<p>content</p>
<p>{{$post->content}}</p>
@foreach($memos as $memo)
    <p>memo content</p>
    <p>{{$memo->content}}</p>
@endforeach
<form method="POST" action="{{action('MemoController@store')}}">
    @csrf
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <textarea name="content" placeholder="メモを入力してください"></textarea>
    <button type="submit">Submit</button>
</form>

