<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index ()
    {
        $posts = Post::orderBy('updated_at', 'desc')->limit(3)->get();

        return view('public.index', compact('posts'));
    }
}
