<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = "pemasukan";
    protected $dates = ['tanggal'];

    protected $fillable = ['jumlah_pemasukan', 'keterangan', 'tanggal'];

    public function saldo ()
    {
        $pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $pengeluaran = Pengeluaran::sum('jumlah');

        $total = $pemasukan-$pengeluaran;
        return $total;
    }

    public function pengeluaran ()
    {
        $pengeluaran = Pengeluaran::all();

        return $pengeluaran;
    }
}
