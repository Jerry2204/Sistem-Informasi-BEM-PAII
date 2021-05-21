<?php 
namespace App\Exports\Sheets;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PengeluaranPerMonthSheet implements FromQuery, WithTitle, WithStyles, WithMapping, WithHeadings, ShouldAutoSize
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
        return Pengeluaran
            ::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }

    public function map($pengeluaran): array
        {
            return [
                [
                    $pengeluaran->jumlah,
                    $pengeluaran->keperluan,
                    $pengeluaran->tanggal
                ]
            ];
        }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Pengeluaran';
    }

    public function headings(): array
    {
        return [
            'Jumlah Pengeluaran',
            'Keperluan',
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