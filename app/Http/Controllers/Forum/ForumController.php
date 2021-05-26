<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forum = Forum::orderBy('created_at', 'DESC')->paginate(10);
        return view('public.forum.index', compact('forum'));
    }

    public function detail($id)
    {
        $forum = Forum::where('id', $id)->first();
        return view('public.forum.forum', compact('forum'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'question' => 'required'
        ]);

        Forum::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'question' => $request->question
        ]);

        return redirect()->back();
    }

    public function destroy()
    {

    }
}
