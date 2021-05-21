<?php 
namespace App\Exports\Sheets;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemasukkanPerMonthSheet implements FromQuery, WithTitle, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
    {
        private $month;
        private $year;
    
        public function __construct(int $year, int $month)
        {
            $this->month = $month;
            $this->year  = $year;
        }
    
        /**
         * @return Builder
         */
        public function query()
        {
            return Pemasukan::query()
                ->whereYear('tanggal', $this->year)
                ->whereMonth('tanggal', $this->month);
        }

        public function map($pemasukan): array
        {
            return [
                [
                    $pemasukan->jumlah_pemasukan,
                    $pemasukan->keterangan,
                    $pemasukan->tanggal
                ]
            ];
        }
    
        /**
         * @return string
         */
        public function title(): string
        {
            return 'Pemasukan';
        }

        public function headings(): array
        {
            return [
                'Jumlah Pemasukan',
                'Keterangan',
                'Tanggal'
            ];
        }

        public function styles(Worksheet $sheet)
        {
            return [
                1    => ['font' => ['bold' => true, 'size' => 12, 'center' => true]],
            ];
        }
    }
?>