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

    public function update (Request $request, ProgramKerja $programKerja) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $programKerja->update($request->all());

        return redirect()->route('program_kerja', $programKerja->departemen_id)->with('sukses', 'Program Kerja berhasil diubah');
    }

    public function detail (ProgramKerja $programKerja)
    {
        if ($programKerja->departemen_id != auth()->user()->kadep->departemen_id){
            return redirect()->route('program_kerja');
        }
        return view('departemen.program_kerja.detail', compact('programKerja'));
    }

    public function destroy (ProgramKerja $programKerja)
    {
        $programKerja->delete();

        return back()->with('sukses', 'Program Kerja berhasil dihapus');
    }
}
