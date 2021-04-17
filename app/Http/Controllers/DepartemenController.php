<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index () {
        $departemen = Departemen::all();

        return view('departemen.index', compact('departemen'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Departemen::create($request->all());

        return back()->with('sukses', 'Departemen Berhasil ditambahkan');
    }
}
