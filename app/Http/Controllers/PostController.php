<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{    
    public function index(Request $request)
    {
        $id = $request->id;
        $posts = Post::where('content_id', $id)->get();
        return view('posts.index', compact('posts'));
        
    }

   

    //
}
