<?php

namespace App\Http\Controllers;

use App\Models\BPH;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BPHController extends Controller
{
    public function index() {
        return view('bph.index');
    }
}
