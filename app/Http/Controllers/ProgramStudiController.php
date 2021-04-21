<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index () {

        $program_studi = ProgramStudi::all();

        return view('program-studi.index', compact('program_studi'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'nama_program_studi' => 'required'
        ]);

        ProgramStudi::create($request->all());

        return back()->with('sukses', 'Program Studi Berhasil Ditambahkan');
    }
}
