<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ForumBPHKemahasiswaan extends Controller
{
    public function index(){
        return view('forums.bph-kemahasiswaan-detail');
    }

    public function detail(){
        return view('forums.bph-kemahasiswaan-detail');
    }
}
