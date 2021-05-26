@extends('systemLayout.app')

@section('title', 'Departemen')

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
                <h4>Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Departemen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Departemen</li>
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
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Daftar Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Departemen</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Daftar Departemen</h4>
                                    <p>Berikut ini merupakan daftar Departemen Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Departemen</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departemen as $department)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            <a href="{{ route('departemen.detail', $department->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $department->id }}">
                                                <form action="{{ route('departemen.delete', $department->id) }}" method="POST" id="delete{{ $department->id }}">
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
                                    <h4 class="text-blue h4">Tambah Departemen BEM KM IT Del</h4>
                                </div>
                            </div>
                            <form action="{{ route('departemen') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama Departemen</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Johnny Brown">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="logo">Logo Departemen</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="file" id="logo" name="logo" value="{{ old('logo') }}">
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
</script>
@endsection
