<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>create content</title>

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
            <h3 class="text-align-left mt-3 ml-3">Create</h3>
        </header>
        <div class="container">
            <div class="row-cols-1 mt-5">
                <form method="POST" action="{{ action('ContentController@store') }}">
                    @csrf 
                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h5>create contents</h5>
                        </div>
                        <div class="card-body text center">
                            <textarea id="name" name="name" class="py-1" style="min-width: 100%" placeholder="コンテンツの名前を入力してください"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>
                    <button type="button" class="btn btn-outline-success mt-3" onclick="location.href='{{ action('ContentController@index') }}'">Cancel</button>
                </form>
            </div>
        </div>
    </body>
</html>

