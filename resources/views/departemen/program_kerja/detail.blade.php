@extends('systemLayout.app')

@section('title', 'Program Kerja')

@section('content')
<div class="page-header">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Program Kerja Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Departemen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Program Kerja Departemen</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Program Kerja Departemen</h4>
        </div>
    </div>
    <form action="{{ route('program_kerja.update', $programKerja->id) }}" method="POST">
        @csrf
        <div class="form-group row @error('judul') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="judul">Program Kerja</label>
            <div class="col-sm-12 col-md-10">
                <input  class="form-control @error('judul') form-control-danger @enderror" type="text" id="judul" name="judul" value="{{ $programKerja->judul }}" placeholder="Melakukan ....">
                @error('judul')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row @error('deskripsi') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label" for="deskripsi">Program Kerja</label>
            <div class="col-sm-12 col-md-10">
                <textarea wire:model="deskripsi" class="form-control @error('deskripsi') form-control-danger @enderror" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi Program Kerja">{{ $programKerja->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
