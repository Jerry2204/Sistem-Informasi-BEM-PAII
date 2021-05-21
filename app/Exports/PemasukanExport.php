<?php

namespace App\Exports;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\PemasukkanPerMonthSheet;
use App\Exports\Sheets\PengeluaranPerMonthSheet;

class PemasukanExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     $pemasukkan = Pemasukan::all();
    //     $pengeluaran = Pengeluaran::all();

    //     $mergedCollection = $pemasukkan->toBase()->merge($pengeluaran);
    //     // dd($mergedCollection);

    //     return $mergedCollection;
    // }

    public function sheets(): array
    {
        $sheets = [];

        for ($month = 0; $month <= 1; $month++) {
            if($month == 0) {
                $now = now();
                $current_year = now()->year;
                $current_month = $now->month;
                $sheets[] = new PemasukkanPerMonthSheet($current_year, $current_month);
            } else if ($month == 1){
                $now = now();
                $current_year = now()->year;
                $current_month = $now->month;
                $sheets[] = new PengeluaranPerMonthSheet($current_year, $current_month);
            }
        }

        return $sheets;
    }
}
