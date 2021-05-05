<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BPH;
use App\Models\Jabatan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(){
        $posts = Post::all();
        return view('public.blog.blog', compact('posts'));
    }

    public function about(){
        $about = About::orderBy('updated_at', 'desc')->first();
        $jabatan_ketua = Jabatan::where('jabatan', 'Ketua')->first();
        $ketua = BPH::where('jabatan_id', $jabatan_ketua->id)->first();

        $jabatan_wakil = Jabatan::where('jabatan', 'Wakil Ketua')->first();
        $wakil = BPH::where('jabatan_id', $jabatan_wakil->id)->first();

        return view('public.about.about', compact('about', 'ketua', 'wakil'));
    }
}
