<a href="{{action('ContentController@create')}}">create</a>

@foreach($contents as $content)
    <p>{{$content->id}}</p>
    <a href="{{action('PostController@index', ['id' => $content->id])}}">{{$content->name}}</a>
@endforeach