@extends('systemLayout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Departemen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Departemen</li>
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
            <form action="{{ route('departemen.update', $departemen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama Departemen</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" id="name" name="name" value="{{ $departemen->name }}" placeholder="Johnny Brown">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label" for="logo">Logo Departemen</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="file" id="logo" name="logo">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
