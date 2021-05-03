@extends('layouts.app')

@section('title', 'Blog')

@section('styles')
    <style>
        .div-change * {
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            font-size: 14px !important;
        }

    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h3 class="heading font-weight-bold">Berita dan Informasi</h3>
        </div>
        @livewire('blog-search-paginate')
    </div>
@endsection
