@extends('systemLayout.app')

@section('title', 'User')

@section('content')

<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Pengaturan Akun</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Akun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4 mb-30">Pengaturan Akun</h4>
            </div>
        </div>
        @if (session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
        @endif
        <form method="POST" action="{{ route('account.setting') }}">
            @csrf
            <div class="form-group row @error('email') has-danger @enderror">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('email') form-control-danger @enderror" name="email" value="{{ $email }}" placeholder="email" type="email">
                    @error('email')
                    <div class="form-control-feedback">Email harus diisi</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row @error('password') has-danger @enderror">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('password') form-control-danger @enderror" name="password" placeholder="Password" type="password">
                    @error('password')
                    <div class="form-control-feedback">Konfirmasi password salah</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" type="password">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
