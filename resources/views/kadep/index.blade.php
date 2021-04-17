@extends('systemLayout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Kepala Departemen</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kepala Departemen</li>
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
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Daftar Kadep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Kadep</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Daftar Kepala Departemen</h4>
                                    <p>Berikut ini merupakan daftar Kepala Departemen Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kadeps as $kadep)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $kadep->user->name }}</td>
                                        <td>{{ $kadep->nim }}</td>
                                        <td>{{ $kadep->jenis_kelamin }}</td>
                                        <td>{{ $kadep->no_hp }}</td>
                                        <td>{{ $kadep->alamat }}</td>
                                        <td>
                                            <span class="badge badge-primary">Primary</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td><span class="badge badge-secondary">Secondary</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td><span class="badge badge-success">Success</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix pb-4">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Tambah Badan Pengurus Harian Kepala Departemen BEM KM IT Del</h4>
                                </div>
                            </div>
                            <form action="{{ route('kadep') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="name">Nama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Johnny Brown">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="nim">NIM</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" name="nim" id="nim" value="{{ old('nim') }}" placeholder="ex: 11419046" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="email">Email</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" id="email" placeholder="ex: jerryandrianto22@gmail.com" name="email" value="{{ old('email') }}" type="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="no_hp">No. Hp</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="ex: 082276858074" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label" for="alamat">Alamat</label>
                                    <div class="col-sm-12 col-md-10">
                                        <textarea class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="ex: Huta II Jl.Protokol Marihat Bandar, Kab. Simalungun, Sumatera Utara" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select name="jenis_kelamin" class="custom-select col-12">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Departemen</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12">
                                            <option selected="">Pilih Departemen</option>
                                            @foreach ($departemen as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
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