<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index ()
    {
        return view('jabatan.index');
    }
}
