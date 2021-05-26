@extends('layouts.app')

@section('title', 'Sejarah Kepengurusan')

@section('content')
<div class="container">
    <div class="mt-4">
        <div class="row d-flex justify-content-between">
            <div class="col-md-12">
                <ol class="breadcrumb bg-white pl-0 text" style="background: transparent !important">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    <li class="breadcrumb-item active" aria-current="page">Sejarah Kepengurusan</li>
                </ol>
            </div>
            <div class="col-12 col-md-8">
                <h4 class="mb-4 heading font-weight-bold">Sejarah Kepengurusan Badan Eksekutif Mahasiswa IT Del</h4>
                {{-- <p class="text font-14 text-secondary mb-2"><i class="fas fa-money-bill-wave"></i></i>&nbsp; Jumlah saldo: <span class="font-weight-bold" style="color: black">Rp. {{ number_format($saldo, 2, ',', '.') }}</span></p> --}}
                <p class="text font-14 text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp; update: {{ now()->format('d M Y') }}</p>
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Ketua</th>
                            <th>Wakil Ketua</th>
                            <th>Periode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $history->ketua }}</td>
                            <td>{{ $history->wakil_ketua }}</td>
                            <td>{{ $history->tahun_mulai->format('M Y') }} - {{ $history->tahun_exp->format('M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4 blog-archieve">
                <div class="blog_post">
                    <h4 class="heading font-weight-bold mb-4">Postingan Terbaru</h4>
                    @forelse ($new_posts as $new_post)
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="{{ route('single.post', $new_post->slug) }}">{{ $new_post->title }}</a>
                            <p class="text-secondary text-parag-child-post">{{ $new_post->kategori->nama_kategori }}</p>
                        </div>
                    @empty
                        <p class="text">Tidak ada postingan</p>
                    @endforelse
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
