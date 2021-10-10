<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke(Request $request)
    {
        return view(view: 'site.home.index');
    }

    public function new(Request $request)
    {
        $posts = Post::all();

        // dd($posts);

        return view(view: 'admin.posts.index', data: compact('posts'));
    }
}
