@extends('layouts.app')

@section('title', 'DEPKOMINFO')

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
                                <table class="table table-striped my-4 text font-14">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Prodi</th>
                                            <th scope="col">Prestasi</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Source</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 7; $i++)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>D4 TRPL 19</td>
                                                <td>CP Hacker Rank 1st Grade</td>
                                                <td>30 February 2021</td>
                                                <td>
                                                    <a href="a">Link</a>
                                                </td>
                                            </tr>
                                        @endfor
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
