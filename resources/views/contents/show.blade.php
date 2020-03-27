<a href="{{action('ContentController@create')}}">create</a>

@foreach($contents as $content)
    <form method="POST" action="{{action('ContentController@destroy', $content)}}">
        @csrf 
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
    <p>{{$content->id}}</p>
    <a href="{{action('PostController@index', ['id' => $content->id])}}">{{$content->name}}</a>
@endforeach