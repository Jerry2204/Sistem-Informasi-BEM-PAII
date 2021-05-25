@extends('systemLayout.app')

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
                <h4>Prestasi Mahasiswa</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
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
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Daftar Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Prestasi</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Prestasi Mahasiswa</h4>
                                    <p>Berikut ini merupakan daftar prestasi mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Program Studi</th>
                                        <th scope="col">Prestasi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestasis as $prestasi)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $prestasi->name }}</td>
                                        <td>{{ $prestasi->program_studi }}</td>
                                        <td>{{ $prestasi->prestasi }}</td>
                                        <td>{{ $prestasi->tanggal }}</td>
                                        <td style="width: 20%">
                                            <a href="{{ route('prestasi_detail', $prestasi->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $prestasi->id }}">
                                                <form action="{{ route('prestasi_delete', $prestasi->id) }}" method="POST" id="delete{{ $prestasi->id }}">
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
                                    <h4 class="text-blue h4">Tambah Prestasi Mahasiswa</h4>
                                </div>
                            </div>
                            <form action="{{ route('admin_prestasi') }}" method="POST">
                                @csrf
                                <div class="form-group row @error('name') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input wire:model="name" class="form-control @error('name') form-control-danger @enderror" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Johnny Brown">
                                        @error('name')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('program_studi') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="program_studi">Program Studi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input wire:model="program_studi" class="form-control @error('program_studi') form-control-danger @enderror" type="text" id="program_studi" name="program_studi" value="{{ old('program_studi') }}" placeholder="ex: D4 TRPL">
                                        @error('program_studi')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('prestasi') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="prestasi">Prestasi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input wire:model="prestasi" class="form-control @error('prestasi') form-control-danger @enderror" type="text" id="prestasi" name="prestasi" value="{{ old('prestasi') }}" placeholder="ex: Finalis ...">
                                        @error('prestasi')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('tanggal') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="tanggal">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input wire:model="tanggal" class="form-control @error('tanggal') form-control-danger @enderror" type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" placeholder="Johnny Brown">
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
                'Deleted!',
                'Your file has been deleted.',
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

