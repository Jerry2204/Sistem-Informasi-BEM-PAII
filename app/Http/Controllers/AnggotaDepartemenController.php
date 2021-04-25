<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaDepartemenController extends Controller
{
    public function index ()
    {
        return view('anggota.index');
    }
}
