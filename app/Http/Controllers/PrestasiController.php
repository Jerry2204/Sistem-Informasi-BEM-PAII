<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('public.prestasi.index', compact('prestasis'));
    }

    public function index_admin ()
    {
        $prestasis = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'program_studi' => 'required',
            'prestasi' => 'required',
            'tanggal' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'nim.required' => 'NIM harus diisi',
            'angkatan.required' => 'Angkatan harus diisi',
            'program_studi.required' => 'Program Studi harus diisi',
            'prestasi.required' => 'Prestasi harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        Prestasi::create($request->all());

        return back()->with('sukses', 'Data berhasil ditambahkan');
    }

    public function detail (Prestasi $prestasi)
    {
        return view('admin.prestasi.detail', compact('prestasi'));
    }

    public function update (Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'name' => 'required',
            'program_studi' => 'required',
            'prestasi' => 'required',
            'tanggal' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'program_studi.required' => 'Program Studi harus diisi',
            'prestasi.required' => 'Prestasi harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('admin_prestasi')->with('sukses', 'Data berhasil diubah');
    }

    public function delete (Prestasi $prestasi)
    {
        $prestasi->delete();

        return back();
    }
}
