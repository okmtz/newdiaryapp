<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Content;
use App\Post;

class ContentController extends Controller
{    
    public function index()
    {
        $user = Auth::user();
        $contents = Content::where('user_id', $user->id)->get();
        return view('contents.show', compact('contents'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('contents.create', compact('user'));
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|unique:contents|max:50',
        ]);
        $user = User::findOrFail($params['user_id']);
        $user->contents()->create($params);
        return redirect()->route('contents');
    }
    public function destroy($content)
    {
        $content = Content::findOrFail($content);
        $posts = Post::where('content_id', $content->id)->get();

        foreach ($posts as $post) {
            $post->memos()->delete();
        };
        $content->posts()->delete();
        $content->delete();
        return redirect()->route('contents');


    }
    

    //
}
