<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Post;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index ()
    {
        return view('admin.history.index');
    }

    public function public_index ()
    {
        $histories = History::all();
        $new_posts = Post::orderBy('updated_at', 'desc')->limit(5)->get();

        return view('public.sejarah_kepengurusan.index', compact('histories', 'new_posts'));
    }
}
