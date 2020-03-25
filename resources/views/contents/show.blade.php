<a href="{{action('ContentController@create')}}">create</a>

@foreach($contents as $content)
    <p>{{$content->name}}</p>
@endforeach