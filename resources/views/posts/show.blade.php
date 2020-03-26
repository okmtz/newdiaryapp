<p>title</p>
<p>{{$post->title}}</p>
<p>content</p>
<p>{{$post->content}}</p>
@foreach($memos as $memo)
    <p>memo content</p>
    <p>{{$memo->content}}</p>
@endforeach