<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        return view('public.forum.index');
    }

    public function detail(){
        return view('public.forum.forum');
    }
}
