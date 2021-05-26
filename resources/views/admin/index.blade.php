@extends('systemLayout.app')

@section('title', 'Dashboard')

@section('content')
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('assets/images/banner-img.png') }}" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Selamat Datang <div class="weight-600 font-30 text-blue">@if (auth()->user()) {{ auth()->user()->name }} @else John Doe @endif</div>
            </h4>
            <p class="font-18 max-width-600 text-justify">Selamat melakukan tugas dengan baik pada Sistem Informasi Badan Eksekutif Mahasiswa Institut Teknologi Del, Sistem Informasi Badan Eksekutif Mahasiswa Institut Teknologi Del ini dibuat untuk membantu pengurus Badan Eksekutif Mahasiswa dalam melakukan pengelolaan data pengurus, keuangan, serta membantu masyarakat umum untuk mengenal Badan Eksekutif Mahasiswa Institut Teknologi Del.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">Rp. {{ number_format($saldo, 2, ',', '.') }}</div>
                <div class="weight-600 font-14">Saldo BEM</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">{{ $bph }}</div>
                <div class="weight-600 font-14">Badan Pengurus Harian</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">{{ $kadep }}</div>
                <div class="weight-600 font-14">Kepala Departemen</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">{{ $anggota }}</div>
                <div class="weight-600 font-14">Anggota</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">{{ $departemen->count() }}</div>
                <div class="weight-600 font-14">Departemen</div>
            </div>
        </div>
    </div>
    @foreach ($departemen as $item)
    <div class="col-xl-4 col-6 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="text-center">
                <div class="h4 mb-0">{{ $item->anggota_departemen->count() }}</div>
                <div class="weight-600 font-14">Anggota {{ $item->name }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
