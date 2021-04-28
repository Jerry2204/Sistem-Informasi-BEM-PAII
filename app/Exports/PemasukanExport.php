<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PemasukanExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::all();
    }

    public function map($pemasukkan): array
    {
        return [
            $pemasukkan->jumlah_pemasukan,
            $pemasukkan->keterangan,
            $pemasukkan->tanggal,
            $pemasukkan->saldo(),
        ];
    }
}
