<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index ()
    {
        $pengeluarans = Pengeluaran::orderBy('tanggal', 'desc')->get();

        return view('keuangan.pengeluaran', compact('pengeluarans'));
    }

    public function add ()
    {
        return view('keuangan.tambah_pengeluaran');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required'
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('keuangan.pengeluaran')->with('sukses', 'Pengeluaran berhasil ditambahkan');
    }

    public function detail (Pengeluaran $pengeluaran)
    {
        return view('keuangan.ubah_pengeluaran', compact('pengeluaran'));
    }

    public function update (Request $request, Pengeluaran $pengeluaran)
    {
        $this->validate($request, [
            'jumlah' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required'
        ]);

        $pengeluaran->update($request->all());

        return redirect()->route('keuangan.pengeluaran')->with('sukses', 'Pengeluaran berhasil diubah');
    }

    public function delete (Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return back()->with('sukses', 'Pengeluaran berhasil dihapus');
    }
}
