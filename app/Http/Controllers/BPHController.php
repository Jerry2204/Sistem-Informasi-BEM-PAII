<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BPHController extends Controller
{
    public function index() {
        return view('bph.index');
    }

    public function addBph() {
        return view('bph.index');
    }
}
