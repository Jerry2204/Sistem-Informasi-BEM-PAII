@extends('systemLayout.app')

@section('title', 'Post')

@section('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 350px;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Blog</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Daftar Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Blog</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Blog</h4>
                                    <p>Berikut ini merupakan daftar Blog Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Pembuat</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td style="width: 30%">
                                            <a target="_blank" href="{{ route('single.post', $post->slug) }}" class="btn btn-sm btn-info">Lihat</a>
                                            <a href="{{ route('post.detail', $post->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-confirm" data-id="{{ $post->id }}">
                                                <form action="{{ route('post.delete', $post->id) }}" method="POST" id="delete{{ $post->id }}">
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
                            <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="title">Judul</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" placeholder="ex: Del goes to school">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Isi Blog</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea name="content" id="editor" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="thumbnail">Thumbnail</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}">
                                    </div>
                                </div>
                                <div class="form-group row @error('kategori_id') has-danger @enderror">
                                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select name="kategori_id" class="custom-select col-12 @error('kategori_id') form-control-danger @enderror">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
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
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
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
</script>
@endsection
