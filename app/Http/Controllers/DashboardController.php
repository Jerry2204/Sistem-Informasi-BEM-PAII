<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDepartemen;
use App\Models\BPH;
use App\Models\Departemen;
use App\Models\Kadep;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $bph = BPH::count();
        $kadep = Kadep::count();
        $anggota = AnggotaDepartemen::count();
        $saldo = Pemasukan::saldo();
        $departemen = Departemen::all();

        return view('admin.index', compact('bph', 'kadep', 'anggota', 'saldo', 'departemen'));
    }
}
