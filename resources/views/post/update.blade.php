@extends('systemLayout.app')

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
                <h4>Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Blog</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="clearfix pb-4">
                <div class="pull-left">
                    <h4 class="text-blue h4">Ubah Departemen BEM KM IT Del</h4>
                </div>
            </div>
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="title">Judul</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}" placeholder="ex: Del goes to school">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="content">Isi Blog</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="content" id="editor" cols="30" rows="10">{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="thumbnail">Thumbnail</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                    </div>
                </div>
                <div class="form-group row @error('kategori_id') has-danger @enderror">
                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <select wire:model="kategori_id" name="kategori_id" class="custom-select col-12 @error('kategori_id') form-control-danger @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->kategori_id ? 'selected' : 'yosi' }}>{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
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
