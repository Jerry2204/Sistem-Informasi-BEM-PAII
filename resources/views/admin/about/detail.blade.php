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
    <form action="{{ route('about_page_update', $about->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="content">Sejarah</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="sejarah" id="editor" cols="30" rows="10">{{ $about->sejarah }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="content">Visi</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="visi" id="editor1" cols="30" rows="10">{{ $about->visi }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="content">Misi</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="misi" id="editor2" cols="30" rows="10">{{ $about->misi }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="content">Tujuan</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="tujuan" id="editor3" cols="30" rows="10">{{ $about->tujuan }}</textarea>
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
