<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Content;



class PostController extends Controller
{    
    public function index(Request $request)
    {
        $id = $request->query('id');
        $posts = Post::where('content_id',$id)->get();
        return view('posts.index', compact('posts'));
        
    }
    public function create(Request $request)
    {
        $content_id = $request->id;
        $content = Content::findOrFail($content_id)->first();
        return view('posts.create', compact('content'));
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
        $id = $content->id;
        $posts = Post::findOrFail($id);

        return view('posts.index', compact('posts', 'id'));
    }

   

    //
}