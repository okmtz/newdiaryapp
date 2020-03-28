<form method="POST" action="{{ action('PostController@store') }}">
    @csrf
    <input type="hidden" name="content_id" value="{{ $content_id }}">
    <input type="text" name="title" placeholder="タイトルを入力してください">
    <textarea name="content" value="内容を入力してください"></textarea>
    <button type="submit">Submit</button>
</form>
