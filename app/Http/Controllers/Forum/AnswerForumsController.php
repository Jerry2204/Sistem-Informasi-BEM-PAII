<?php

namespace App\Http\Controllers\Forum;
use App\Http\Controllers\Controller;
use App\Models\AnswerForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerForumsController extends Controller
{
    public function store(Request $request, $forum_id){
        $request->validate([
            'answer' => 'required'
        ]);

        AnswerForum::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'answer' => $request->answer,
            'forum_id' => $forum_id,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->back()->with('success', 'Comment berhasil ditambah');

    }
}
