<a href="{{action('PostController@create', ['id' => $id])}}">create post</a>

@foreach($posts as $post)
    <p>title</p>
    <p>{{$post->title}}</p>
    <p>content</p>
    <p>{{$post->content}}</p>
    <a href="{{action('PostController@show',$post->id)}}">詳細はこちら</a>
   

@endforeach  