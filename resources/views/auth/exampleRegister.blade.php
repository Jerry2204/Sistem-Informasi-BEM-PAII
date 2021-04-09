@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12 py-3">
        <h1 class="text-center">Register</h1>
    </div>
    <div class="col-lg-6 py-3 offset-lg-3">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama anda" value="{{ old('name') }}">
              @error('name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan username anda" value="{{ old('username') }}">
              @error('username')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan email anda" value="{{ old('email') }}">
              @error('email')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukkan password anda">
              @error('password')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan password anda">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
