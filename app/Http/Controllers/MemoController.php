<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Memo;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:200',
        ]);
        $post = Post::findOrFail($params['post_id']);
        $post->memos()->create($params);
        return redirect()->action('PostController@show', $params['post_id']);

    }
    //
}
