<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Memo;

class MemoController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:200',
        ]);
        $post = Post::findOrFail($params['post_id']);
        $post->memos()->create($params);
        $memos = Memo::where('post_id', $params['post_id'])->get();
        $post = Post::findOrFail($params['post_id']);
        return view('posts.show', compact('post','memos'));

    }
    //
}
