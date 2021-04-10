@extends('systemLayout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Dashboard</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">BPH</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Daftar BPH</h4>
            <p>Berikut ini merupakan daftar Badan Pengurus Harian Badan Eksekutif Mahasiswa Institut Teknologi Del</p>
        </div>
        <div class="pull-right">
            <a href="{{ route('addBph') }}" class="btn btn-primary btn-sm text-white"><i class="icon-copy fi-plus"></i> Tambah BPH</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Tag</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <span class="badge badge-primary">Primary</span>
                </td>
            </tr>
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
@endsection
