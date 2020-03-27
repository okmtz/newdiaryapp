<form method="POST" action="{{action('PostController@update', $post)}}">
    @csrf 
    @method('PUT')
    <input type="hidden" name="id" value="{{$post->id}}">
    <textarea name="title">{{old('title') ?: $post->title}}</textarea>
    <textarea name="content">{{old('content') ?: $post->content}}</textarea>
    <button type="submit">Submit</button>
    <button type="button" onclick="location.href='{{action('PostController@show', $post)}}'">Cancel</button>
</form>