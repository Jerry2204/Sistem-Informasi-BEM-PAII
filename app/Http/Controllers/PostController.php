<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function singlePost ($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('public.blog.singlePost', compact('post'));
    }
}
