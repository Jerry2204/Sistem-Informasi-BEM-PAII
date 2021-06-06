<?php

namespace App\Http\Controllers;

use App\Exports\PemasukanExport;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Kategori;
use App\Models\Pengeluaran;
use App\Models\Post;
use DateTime;
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
        $pengeluarans = Pengeluaran::whereMonth('tanggal', $current_month)->whereYear('tanggal', $current_year)->orderBy('tanggal')->get();
        $saldo = Pemasukan::saldo();
        $category = Kategori::all();

        return view('public.keuangan.index', compact('pemasukans', 'current_month', 'saldo', 'new_posts', 'category', 'pengeluarans'));
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

    public function getMonthName($number_of_month){
        $dateObj   = DateTime::createFromFormat('!m', $number_of_month);
        $monthName = $dateObj->format('F');
        return $monthName;
    }

    public function getMonth(){
        $now = now();
        $current_month = date('m', strtotime("-4 months", strtotime(now())));
        $month_array = array();
        $effectiveDate = $now->month;
        for ($i = $current_month; $i <= $effectiveDate ; $i++) {
            $month_no = $i;
			$month_name = $this->getMonthName($i);
            $month_array[ $month_no ] = $month_name;
        }
        return $month_array;
    }

	public function getMonthlyPemasukanCountPayment( $month ) {
        $current_year = now()->year;
        $pemasukans = Pemasukan::whereMonth('tanggal', $month)->whereYear('tanggal', $current_year)->orderBy('tanggal')->sum('jumlah_pemasukan');
		return $pemasukans;
	}

    public function getMonthlyPengeluaranCountPayment( $month ) {
        $current_year = now()->year;
        $pemasukans = Pengeluaran::whereMonth('tanggal', $month)->whereYear('tanggal', $current_year)->orderBy('tanggal')->sum('jumlah');
		return $pemasukans;
	}

    public function getPemasukanData(){
        $monthly_keuangan_count_array = array();
		$month_array = $this->getMonth();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_keuangan_count = $this->getMonthlyPemasukanCountPayment( $month_no );
				array_push( $monthly_keuangan_count_array, $monthly_keuangan_count );
				array_push( $month_name_array, $month_name );
			}
		}

        return $monthly_keuangan_count_array;
    }

    public function getPengeluaranData(){
        $monthly_keuangan_count_array = array();
		$month_array = $this->getMonth();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_keuangan_count = $this->getMonthlyPengeluaranCountPayment( $month_no );
				array_push( $monthly_keuangan_count_array, $monthly_keuangan_count );
				array_push( $month_name_array, $month_name );
			}
		}

        return [
            'pengeluaran_count_data' => $monthly_keuangan_count_array,
            'months' => $month_name_array
        ];
    }

	public function getMonthlyKeuanganData() {
        $data = $this->getPengeluaranData();
		$monthly_keuangan_data_array = array(
			'months' => $data['months'],
			'pemasukan_count_data' => $this->getPemasukanData(),
			'pengeluaran_count_data' => $data['pengeluaran_count_data'],
		);

		return $monthly_keuangan_data_array;
    }
}
