@extends('systemLayout.app')

@section('content')
<div class="page-header">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Tentang Kami</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Konten Tentang Kami</h4>
        </div>
    </div>
    <form action="{{ route('prestasi_update', $prestasi->id) }}" method="POST">
        @csrf
        <div class="form-group row @error('name') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="name" class="form-control @error('name') form-control-danger @enderror" type="text" id="name" name="name" value="{{ $prestasi->name }}" placeholder="Johnny Brown">
                @error('name')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('program_studi') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="program_studi">Program Studi</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="program_studi" class="form-control @error('program_studi') form-control-danger @enderror" type="text" id="program_studi" name="program_studi" value="{{ $prestasi->program_studi }}" placeholder="ex: D4 TRPL">
                @error('program_studi')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('prestasi') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="prestasi">Prestasi</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="prestasi" class="form-control @error('prestasi') form-control-danger @enderror" type="text" id="prestasi" name="prestasi" value="{{ $prestasi->prestasi }}" placeholder="ex: Finalis ...">
                @error('prestasi')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('tanggal') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
            <div class="col-sm-12 col-md-10">
                <input wire:model="tanggal" class="form-control @error('tanggal') form-control-danger @enderror" type="date" id="tanggal" name="tanggal" value="{{ $prestasi->tanggal }}" placeholder="Johnny Brown">
                @error('tanggal')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection
