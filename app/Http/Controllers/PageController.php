<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index ()
    {
        $posts = Post::all();

        return view('public.index', compact('posts'));
    }
}
