@extends('layouts.app')

@section('title', 'Prestasi')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prestasi.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-12 col-md-12">
                            <h3 class="heading font-weight-bold">PRESTASI MAHASISWA</h3>
                            <div class="table-responsive-xl">
                                <table class="table table-striped my-4 text font-14 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Angkatan</th>
                                            <th scope="col">Prodi</th>
                                            <th scope="col">Prestasi</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prestasis as $prestasi)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $prestasi->name }}</td>
                                                <td>{{ $prestasi->nim }}</td>
                                                <td>{{ $prestasi->angkatan }}</td>
                                                <td>{{ $prestasi->program_studi }}</td>
                                                <td>{{ $prestasi->prestasi }}</td>
                                                <td>{{ $prestasi->tanggal->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ $prestasi->link }}">
                                                        {{ substr($prestasi->link, 0, 20) }}...
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example" class="navs-search">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') @endsection
