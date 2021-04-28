<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    public function index ()
    {
        return view('kemahasiswaan.index');
    }
}
