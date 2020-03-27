<a href="{{action('PostController@edit', $post)}}">投稿を編集する</a>
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

