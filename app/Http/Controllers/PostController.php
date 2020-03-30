<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Content;
use App\Memo;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = $request->query('id');
        $posts = Post::where('content_id',$id)->orderBy('created_at', 'desc')->paginate(5);
        $content = Content::findOrFail($id);
        return view('posts.index', compact('content', 'posts', 'id'));
        
    }
    public function create(Request $request)
    {
        $content_id = $request->query('id');
        return view('posts.create', compact('content_id'));
    }
    public function store(Request $request)
    {
        $params = $request->validate([
            'content_id' => 'required|exists:contents,id',
            'title' => 'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $content = Content::findOrFail($params["content_id"]);
        $content->posts()->create($params);
        return redirect()->route('posts', ['id' => $content->id]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $memos = Memo::where('post_id', $post->id)->get();
        return view('posts.show', compact('post', 'memos'));
    }
    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('posts.edit', compact('post'));
    }
    public function update($post, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:2000',
        ]);
        $post = Post::findOrFail($post);
        $post->fill($params)->save();
        return redirect()->route('posts', ['id' => $post->id]);
    }
    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $id = $post->content_id;
        $post->memos()->delete();
        $post->delete();
        return redirect()->route('posts', ['id' => $id]);
  }

   

    //
}
