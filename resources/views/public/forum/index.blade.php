@extends('layouts.app')

@section('title', 'Forum Diskusi')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forum.css') }}">
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h6>Forum Diskusi</h6>
                <ol class="breadcrumb pl-0" style="background: transparent">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forum</li>
                </ol>
            </div>

            <div class="col-md-12 bg-white shadow-sm p-4">
                <h3 class="heading font-weight-bold">Forum Diskusi</h3>
                <p class="text mt-3 font-14">Fitur pada Forum Diskusi ini diberikan kepada pengguna untuk melakukan diskusi kepada Badan Pengurus Harian BEM IT DEL secara online dimana bertujuan agar masyarakat atau pengguna mendapatkan informasi yang lebih mengenai apa saja yang ada di Badan Eksekutif Mahasiswa Institut Teknologi Del.
                </p>
            </div>

            <div class="col-md-12 form-forum">
                @livewire('forum-search-bar')
            </div>


            @if (Auth::check())
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog text font-14">
                        <form method="POST" action="{{ route('add_forum') }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Diskusi Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control font-14" name="name"
                                            value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="text" class="form-control font-14" name="email"
                                            value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Pertanyaan:</label>
                                        <textarea class="form-control font-14" name="question"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary font-14"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary font-14 font-weight-light">
                                        Tambah
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog text font-14">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Diskusi Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Silahkan login terlebih dahulu
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary font-14" data-dismiss="modal">Close</button>
                                <a href="{{ route('login') }}"
                                    class="btn btn-primary btn-masuk font-14 font-weight-light">Login</a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>

        <div class="col-md-12 p-4 pb-0 mt-3 mb-0 bg-white">
            @forelse ($forum as $item)
                <div>
                    <div class="row">
                        <div class="col-md-1 d-flex justify-content-start">
                            <div class="rounded-circle border box-image">
                                <img class="image-child"
                                    src="{{ asset('assets/images/profil/profile.jpeg') }}"
                                    alt="...">
                            </div>
                        </div>
                        <div class="col-md-11 pl-0 forum-desc">
                            <p class="text font-14 font-weight-bold my-1">{{ $item->name }}</p>
                            <a class="text font-14" href="/forums/{{ $item->id }}">{{ $item->question }}</a>
                            <p class="text font-12 text-secondary mt-2 font-weight-regular" style="opacity: 1">
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                            <div class="d-flex flex-row">
                                <a href="/forums/{{ $item->id }}" class="text font-14 mr-4 mb-3 font-weight-bold"><i class="fas fa-comment-alt"></i> &nbsp;@php
                                    echo count($item->answer_forums);
                                @endphp
                                    Answer
                                </a>
                                @if (Auth::check())
                                    @if (auth()->user()->email == $item->email)
                                    <a href="#" class="text font-14 mr-4 mb-3 font-weight-bold text-danger text-decoration-none delete-confirm" data-id="{{ $item->id }}">
                                        <form action="{{ route('forum.delete', $item->id) }}" method="POST" id="delete{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @empty
                <p class="text font-14 text-danger">Forum Belum Ada</p>
            @endforelse
        </div>
    </div>
    <nav aria-label="Page navigation example" class="navs-search">
        <ul class="pagination mt-5">
            <li class="page-item @if ($forum->currentPage() === 1) disabled @endif">
                <a class="page-link" href="/forum?page={{ $forum->currentPage() - 1 }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $forum->lastPage(); $i++)
                <li class="page-item">
                    <a class="page-link" href="/forum?page={{ $i }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if ($forum->currentPage() === $forum->total()) disabled @endif">
                <a class="page-link" href="/forum?page={{ $forum->currentPage() + 1 }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    </div>
@endsection


@section('script')
<script src="{{ asset('assets/js/forums-faq.js') }}"></script>

<script>
$('.delete-confirm').click(function(e) {
    id = e.target.dataset.id

    Swal.fire({
        title: 'Apakah anda yakin akan menghapus forum ini?',
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
@endsection
