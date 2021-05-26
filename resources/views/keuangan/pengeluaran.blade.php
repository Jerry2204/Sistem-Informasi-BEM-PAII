@extends('systemLayout.app')

@section('title', 'Keuangan')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/responsive.bootstrap4.min.css') }}">
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
@endsection

@section('content')
{{-- Session --}}
@if (session()->has('sukses'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('sukses') }}",
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Pengeluaran Keuangan BEM IT Del</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Keuangan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="pd-20 table-responsive">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Daftar Pengeluaran Keuangan</h4>
                        <p>Berikut ini merupakan daftar Pengeluaran Keuangan Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                        <p><b>Saldo = Rp. {{ number_format($saldo, 2, ',', '.') }}</b></p>
                        <a href="{{ route('pengeluaran.tambah') }}" class="btn btn-primary">
                            Tambah Pengeluaran
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-sm btn-primary">
                            Export Excel
                        </a>
                    </div>
                </div>
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jumlah Uang</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluarans as $pengeluaran)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>Rp. {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
                            <td>{{ $pengeluaran->keperluan }}</td>
                            <td>{{ $pengeluaran->tanggal->format('d M Y') }}</td>
                            <td style="width: 20%">
                                <a href="{{ route('pengeluaran.ubah', $pengeluaran->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $pengeluaran->id }}">
                                    <form action="{{ route('pengeluaran.hapus', $pengeluaran->id) }}" method="POST" id="delete{{ $pengeluaran->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.delete-confirm').click(function(e) {
    id = e.target.dataset.id

    Swal.fire({
        title: 'Apakah anda yakin akan menghapus data ini?',
        text: "Kamu tidak dapat mengembalikan data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#delete${id}`).submit();

                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    })
</script>
<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endsection
