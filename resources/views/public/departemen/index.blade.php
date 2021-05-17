@extends('layouts.app')

@section('title', 'DEPKOMINFO')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/departemen.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-12 col-md-3">
                            <img src="{{ asset('assets/images/logo-departemen/' . $departemen->logo) }}"
                                class="d-inline-block align-top img-fluid" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex align-items-center">
                            <h1 class="heading font-weight-bold text-center">{{ $departemen->name }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 desc p-0">
        <div class="container py-5 text-center text font-14">
                {!! $departemen->description ? $departemen->description->description : '' !!}
        </div>
    </div>
    <div class="col-md-12 my-5">
        <div class="container">
            <h4 class="heading font-weight-bold text-center">PROGRAM KERJA</h4>
            <div class="row mt-4">
                @foreach ($departemen->program_kerja as $program_kerja)
                    <div class="col-md-4 d-flex justify-content-center mt-4">
                        <div class="card text-whitemb-3 heading" style="max-width: 18rem;">
                            <div class="card-body text font-14 text-center">
                                <h6 class="card-title">{{ $program_kerja->judul }}</h6>
                                <p class="card-text">{{ $program_kerja->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection
