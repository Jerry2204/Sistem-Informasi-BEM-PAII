<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
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

    public function store (Request $request) {
        $user = auth()->user()->id;
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'image',
            'content' => 'required'
        ]);

        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('assets/images/thumbnail-postingan',$request->file('thumbnail')->getClientOriginalName());
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            Post::create([
                'title' => $request->title,
                'user_id' => $user,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'thumbnail' => $thumbnail
            ]);
        } else {
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return back()->with('sukses', 'Blog berhasil ditambahkan');
    }

    public function detail () {
        
    }
}
