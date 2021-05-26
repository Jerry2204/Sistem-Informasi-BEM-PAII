@extends('systemLayout.app')

@section('title', 'Program Kerja')

@section('styles')
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
<div class="page-header">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Program Kerja</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Departemen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Program Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Program Kerja</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Program Kerja Departemen {{ $departemen->name }}</h4>
                                    <p>Berikut ini merupakan daftar Program Kerja Departemen {{ $departemen->name }} Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Program Kerja</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departemen->program_kerja as $program_kerja)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $program_kerja->judul }}</td>
                                        <td>{!! substr($program_kerja->deskripsi, 0, 30) !!}...</td>
                                        <td style="width: 30%">
                                            <a href="{{ route('program_kerja.detail', $program_kerja->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $program_kerja->id }}">
                                                <form action="{{ route('program_kerja.delete', $program_kerja->id) }}" method="POST" id="delete{{ $program_kerja->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix pb-4">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Tambah Postingan Website</h4>
                                </div>
                            </div>
                            <form action="{{ route('program_kerja', $departemen->id) }}" method="POST">
                                @csrf
                                <div class="form-group row @error('judul') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="judul">Program Kerja</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input wire:model="judul" class="form-control @error('judul') form-control-danger @enderror" type="text" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Melakukan ....">
                                        @error('judul')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('deskripsi') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="deskripsi">Deskripsi Program Kerja</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea wire:model="deskripsi" class="form-control @error('deskripsi') form-control-danger @enderror" type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi Program Kerja">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
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
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    $('.delete-confirm').click(function(e) {
    id = e.target.dataset.id

    Swal.fire({
        title: 'Apakah anda yakin akan menghapus data ini?',
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
                'Dihapus!',
                'Data berhasil dihapus',
                'success'
                )
            }
        })
    })

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

