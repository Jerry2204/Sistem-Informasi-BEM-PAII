<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumAdminController extends Controller
{
    public function index(){
        return view('forums.index');
    }

    public function store(Request $request){

    }

    public function view(Request $request){

    }

    public function destroy(Request $request){
        
    }
}
