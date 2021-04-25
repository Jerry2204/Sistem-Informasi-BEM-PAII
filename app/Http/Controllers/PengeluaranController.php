<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index ()
    {
        return view('keuangan.pengeluaran');
    }
}
