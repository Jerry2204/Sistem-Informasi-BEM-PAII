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

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Daftar Konten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Konten</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Tentang Kami</h4>
                                    <p>Berikut ini merupakan daftar konten halaman tentang kami Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Sejarah</th>
                                        <th scope="col">Visi</th>
                                        <th scope="col">Misi</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abouts as $about)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{!! substr($about->sejarah, 0, 30) !!}...</td>
                                        <td>{!! substr($about->visi, 0, 30) !!}...</td>
                                        <td>{!! substr($about->misi, 0, 30) !!}...</td>
                                        <td>{!! substr($about->tujuan, 0, 30) !!}...</td>
                                        <td style="width: 20%">
                                            <a href="{{ route('about_page_detail', $about->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $about->id }}">
                                                <form action="{{ route('about_page.delete', $about->id) }}" method="POST" id="delete{{ $about->id }}">
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
                            <form action="{{ route('about_page') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Sejarah</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="sejarah" id="editor" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Visi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="visi" id="editor1" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Misi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="misi" id="editor2" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Tujuan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="tujuan" id="editor3" cols="30" rows="10">{{ old('content') }}</textarea>
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
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
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

