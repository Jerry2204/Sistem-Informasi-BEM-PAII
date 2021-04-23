<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        $kategori = Kategori::all();

        return view('post.index', compact('posts', 'kategori'));
    }

    public function singlePost ($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();

        if (!$post->count()) {
            abort(404);
        }


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
                'kategori_id' => $request->kategori_id,
                'thumbnail' => $thumbnail,
            ]);
        } else {
            Post::create([
                'title' => $request->title,
                'user_id' => $user,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'kategori_id' => $request->kategori_id,
            ]);
        }

        return back()->with('sukses', 'Blog berhasil ditambahkan');
    }

    public function detail (Post $post) {
        $kategori = Kategori::all();
        return view('post.update', compact('post', 'kategori'));
    }

    public function update (Request $request, Post $post) {
        $user = auth()->user()->id;
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'image',
            'content' => 'required'
        ]);

        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('assets/images/thumbnail-postingan',$request->file('thumbnail')->getClientOriginalName());
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $post->update([
                'title' => $request->title,
                'user_id' => $user,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'thumbnail' => $thumbnail,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'user_id' => $user,
                'content' => $request->content,
                'slug' => Str::slug($request->title),
                'kategori_id' => $request->kategori_id,
            ]);
        }

        return redirect()->route('post')->with('sukses', 'Data berhasil diubah');
    }

    public function delete (Post $post) {
        $delete = $post->delete();

        if ($delete) {
            return back()->with('sukses', 'Data berhasil dihapus');
        } else {
            return back()->with('gagal', 'Data gagal dihapus');
        }
    }
}
