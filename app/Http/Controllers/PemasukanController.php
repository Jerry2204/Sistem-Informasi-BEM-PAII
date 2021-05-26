<?php

namespace App\Http\Controllers;

use App\Exports\PemasukanExport;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Kategori;
use App\Models\Pengeluaran;
use App\Models\Post;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    public function index ()
    {
        $pemasukans = Pemasukan::orderBy('tanggal', 'desc')->get();
        $saldo = Pemasukan::saldo();

        return view('keuangan.pemasukan', compact('pemasukans', 'saldo'));
    }

    public function publicView ()
    {
        $now = now();
        $current_year = now()->year;
        $current_month = $now->month;
        $new_posts = Post::orderBy('updated_at', 'desc')->limit(5)->get();
        $pemasukans = Pemasukan::whereMonth('tanggal', $current_month)->whereYear('tanggal', $current_year)->orderBy('tanggal')->get();
        $saldo = Pemasukan::saldo();
        $category = Kategori::all();

        return view('public.keuangan.index', compact('pemasukans', 'current_month', 'saldo', 'new_posts', 'category'));
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

        return back();
    }
}
