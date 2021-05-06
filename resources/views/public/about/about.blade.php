@extends('layouts.app')

@section('title', 'Kegiatan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h6>Tentang Kami</h6>
                    <ol class="breadcrumb bg-white pl-0" style="background: transparent !important">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
                <div class="col-md-12 bg-white shadow-sm p-4">
                    <h3 class="heading font-weight-bold">Sejarah</h3>
                    <div class="text mt-3 font-14">
                        @if ($about)
                        {!! $about->sejarah !!}
                        @endif
                    </div>
                </div>

                <div class="col-md-12 my-5 p-4">
                    <div class="col-12 px-0 line">
                        <h3 class="heading font-weight-bold p-0 m-0">PENGURUS INTI</h3>
                    </div>
                    <div class="row mt-5">
                        @if ($ketua)
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <img class="image_about"
                                        src="{{ $ketua->foto() }}"
                                        alt="" srcset="">
                                    </div>
                                </div>
                                <div class="py-3 col-12 text-center">
                                    <h5 class="heading font-weight-bold">Ketua BEM</h5>
                                    <p class="text font-14 font-weight-bold">
                                        {{ $ketua->user->name }} <br>
                                        {{ $ketua->nim }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($wakil)
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <img class="image_about"
                                            src="{{ $wakil->foto() }}"
                                            alt="" srcset="">
                                    </div>
                                </div>
                                <div class="py-3 col-12 text-center">
                                    <h5 class="heading font-weight-bold">Wakil Ketua BEM</h5>
                                    <p class="text font-14 font-weight-bold">
                                        {{ $wakil->user->name }} <br>
                                        {{ $wakil->nim }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 visimisi">
        <div class="container py-5">
            @if ($about)
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="heading font-weight-bold">VISI</h3>
                    <div class="text font-14 my-4">
                        {!! $about->visi !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="heading font-weight-bold">MISI</h3>
                    <div class="text mt-3 font-14">
                        {!! $about->misi !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h3 class="heading font-weight-bold text-center">TUJUAN KM IT DEL</h3>
            <div class="text mt-3 font-14">
                @if ($about)
                {!! $about->tujuan !!}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
