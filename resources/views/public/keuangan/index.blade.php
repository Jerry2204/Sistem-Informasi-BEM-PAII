@extends('layouts.app')

@section('title', 'Keuangan')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="row d-flex justify-content-between">
            <div class="col-md-12">
                <ol class="breadcrumb bg-white pl-0 text" style="background: transparent !important">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keuangan BEM</li>
                </ol>
            </div>
            <div class="col-12 col-md-9">
                <h3 class="mb-4 heading font-weight-bold">Keuangan Badan Eksekutif Mahasiswa IT Del Bulan ini</h3>
                <p class="text font-14 text-secondary mb-2"><i class="fas fa-money-bill-wave"></i></i>&nbsp; Jumlah saldo: <span class="font-weight-bold" style="color: black">Rp. {{ number_format($saldo, 2, ',', '.') }}</span></p>
                <p class="text font-14 text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp; update: {{ now()->format('d M Y') }}</p>
                <h4 class="heading font-weight-bold mt-5 mb-4">Pemasukan </h4>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Jumlah Pemasukan</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukans as $pemasukan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>Rp. {{ number_format($pemasukan->jumlah_pemasukan, 2, ',', '.') }}</td>
                            <td>{{ $pemasukan->keterangan }}</td>
                            <td>{{ $pemasukan->tanggal->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-3 blog-archieve">
                <div class="blog_post">
                    <h4 class="heading font-weight-bold mb-4">Postingan Terbaru</h4>
                    @foreach ($new_posts as $new_post)
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="{{ route('single.post', $new_post->slug) }}">{{ $new_post->title }}</a>
                            <p class="text-secondary text-parag-child-post">{{ $new_post->kategori->nama_kategori }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="archieve mt-4">
                    <h4 class="heading font-weight-bold mb-4">Category</h4>
                    <div class="my-2 border-bottom pb-2 pt-0">
                        @forelse ($category as $item)
                        <a class="text-secondary text-parag-child-archieve font-14" href="{{ route('blog_kategori', $item->id) }}">{{ $item->nama_kategori }}</a>
                        @empty
                        <p>No Category</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
