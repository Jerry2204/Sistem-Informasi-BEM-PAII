<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $blog_id){
        $request->validate([ 
            'comment' => 'required'
        ]);
        
        Comment::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'comment' => $request->comment,
            'blog_id' => $blog_id,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->back()->with('success', 'Comment berhasil ditambah');

    }
}
