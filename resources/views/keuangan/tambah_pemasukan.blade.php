@extends('systemLayout.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Pemasukan Keuangan BEM IT Del</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Keuangan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemasukan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="pd-20 table-responsive">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Pemasukan</h4>
                    </div>
                </div>
                <form action="{{ route('pemasukan.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row @error('jumlah_pemasukan') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="jumlah_pemasukan">Jumlah Pemasukan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('jumlah_pemasukan') form-control-danger @enderror" type="number" id="jumlah_pemasukan" name="jumlah_pemasukan" value="{{ old('jumlah_pemasukan') }}" placeholder="ex: 200000">
                            @error('jumlah_pemasukan')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @error('keterangan') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="keterangan">Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('keterangan') form-control-danger @enderror" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" placeholder="ex: Anggaran perlombaan" type="text">
                            @error('keterangan')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @error('tanggal') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('tanggal') form-control-danger @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" placeholder="" type="date">
                            @error('tanggal')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
