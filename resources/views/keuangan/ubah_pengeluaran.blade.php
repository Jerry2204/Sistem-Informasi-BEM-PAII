@extends('systemLayout.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Pengeluaran Keuangan BEM IT Del</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Keuangan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
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
                        <h4 class="text-blue h4">Ubah Pengeluaran</h4>
                    </div>
                </div>
                <form action="{{ route('pengeluaran.ubah', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row @error('jumlah') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="jumlah">Jumlah Pengeluaran</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('jumlah') form-control-danger @enderror" type="number" id="jumlah" name="jumlah" value="{{ $pengeluaran->jumlah }}" placeholder="ex: 200000">
                            @error('jumlah')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @error('keperluan') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="keperluan">Keperluan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('keperluan') form-control-danger @enderror" name="keperluan" id="keperluan" value="{{ $pengeluaran->keperluan }}" placeholder="ex: Anggaran perlombaan" type="text">
                            @error('keperluan')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @error('tanggal') has-danger @enderror">
                        <label class="col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control @error('tanggal') form-control-danger @enderror" id="tanggal" name="tanggal" value="{{ $pengeluaran->tanggal->format('Y-m-d') }}" placeholder="" type="date">
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
        </div>
    </div>
</div>
@endsection

@section('scripts')
