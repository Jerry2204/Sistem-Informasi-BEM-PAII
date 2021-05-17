@extends('systemLayout.app')

@section('content')
<div class="page-header">
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Deskripsi Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Departemen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Deskripsi Departemen</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Deskripsi Departemen</h4>
        </div>
    </div>
    <form action="{{ route('departemen_description.update', $description->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label" for="content">Deskripsi</label>
            <div class="col-sm-12 col-md-10">
                <textarea name="description" id="editor" cols="30" rows="10">{{ $description->description }}</textarea>
            </div>
        </div>
        <div class="form-group row @error('departemen_id') has-danger @enderror">
            <label class="col-sm-12 col-md-2 col-form-label">Departemen</label>
            <div class="col-sm-12 col-md-10">
                <select wire:model="departemen_id" name="departemen_id" class="custom-select col-12 @error('departemen_id') form-control-danger @enderror">
                    <option value="">Pilih Departemen</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $description->departemen_id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('departemen_id')
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
