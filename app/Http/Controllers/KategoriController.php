<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index () {
        return view('post.kategori.index');
    }

    public function blog_kategori (Kategori $kategori)
    {
        $posts = Post::where('kategori_id', $kategori->id)->paginate(9);

        return view('public.blog.kategori', compact('posts', 'kategori'));
    }
}
