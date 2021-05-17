<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index (Departemen $departemen)
    {
        if(auth()->user()->kadep->departemen->id != $departemen->id) {
            return redirect()->route('dashboard');
        }

        return view('departemen.program_kerja.index', compact('departemen'));
    }

    public function store (Request $request, $departemen_id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        ProgramKerja::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'departemen_id' => $departemen_id
        ]);

        return back()->with('sukses', 'Program Kerja berhasil ditambahkan');
    }
}
