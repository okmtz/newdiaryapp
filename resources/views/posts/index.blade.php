<a href="{{action('PostController@create', ['id' => $id])}}">create post</a>

@foreach($posts as $post)
    <p>title</p>
    <p>{{$post->title}}</p>
    <p>content</p>
    <p>{{$post->content}}</p>
@endforeach  