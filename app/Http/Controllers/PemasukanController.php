<?php

namespace App\Http\Controllers;

use App\Exports\PemasukanExport;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    public function index ()
    {
        $pemasukans = Pemasukan::orderBy('tanggal', 'desc')->get();

        return view('keuangan.pemasukan', compact('pemasukans'));
    }

    public function publicView ()
    {
        $now = now();
        $current_month = $now->month;
        $pemasukans = Pemasukan::whereMonth('tanggal', $current_month)->orderBy('tanggal')->get();

        return view('public.keuangan.index', compact('pemasukans', 'current_month'));
    }

    public function add ()
    {
        return view('keuangan.tambah_pemasukan');
    }

    public function store (Request $request)
    {
        Pemasukan::create($request->all());

        return redirect()->route('keuangan.pemasukan')->with('sukses', 'Pemasukan berhasil ditambahkan');
    }

    public function export()
    {
        return Excel::download(new PemasukanExport, 'keuangan.xlsx');
    }

    public function detail (Pemasukan $pemasukan)
    {
        return view('keuangan.ubah_pemasukan', compact('pemasukan'));
    }

    public function update (Pemasukan $pemasukan, Request $request)
    {
        $this->validate($request, [
            'jumlah_pemasukan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        $pemasukan->update([
            'jumlah_pemasukan' => $request->jumlah_pemasukan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('keuangan.pemasukan')->with('sukses', 'Pemasukan berhasil diubah');
    }

    public function deletePemasukan (Pemasukan $pemasukan)
    {
        if ($pemasukan)
        {
            $pemasukan->delete();
        }

        return back()->with('sukses', 'Pemasukan berhasil dihapus');
    }
}
