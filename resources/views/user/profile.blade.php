@extends('systemLayout.app')

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    @if (auth()->user()->role == 'admin')
                    <img src="{{ asset('assets/images/photo1.jpg') }}" alt="" class="avatar-photo">
                    @else
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img src="{{ auth()->user()->gambar() }}" alt="" class="profile-image" class="text-center">
                    @endif
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Foto</h4>
                                </div>
                                <form action="{{ route('ubah_foto', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body pd-5">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" value="Update" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0 mt-3">{{ auth()->user()->name }}</h5>
                <p class="text-center text-muted font-14">{{ auth()->user()->peran() }}</p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                    <ul>
                        <li>
                            <span>Email Address:</span>
                            {{ auth()->user()->email }}
                        </li>
                        @if (auth()->user()->role == 'kadep')
                        <li>
                            <span>No. HP:</span>
                            {{ auth()->user()->kadep->no_hp }}
                            <li>
                                <span>Alamat:</span>
                                {{ auth()->user()->kadep->alamat }}
                            </li>
                            <li>
                                <span>Jenis Kelamin:</span>
                                {{ auth()->user()->kadep->jenis_kelamin }}
                            </li>
                        </li>
                        @elseif ((auth()->user()->role == 'bph'))
                        <li>
                            <span>Phone Number:</span>
                            {{ auth()->user()->bph->no_hp }}
                        </li>
                        <li>
                            <span>Alamat:</span>
                            {{ auth()->user()->bph->alamat }}
                        </li>
                        <li>
                            <span>Jenis Kelamin:</span>
                            {{ auth()->user()->bph->jenis_kelamin }}
                        </li>
                        @elseif ((auth()->user()->role == 'kemahasiswaan'))
                        <li>
                            <span>Phone Number:</span>
                            {{ auth()->user()->kemahasiswaan->no_hp }}
                        </li>
                        <li>
                            <span>Alamat:</span>
                            {{ auth()->user()->kemahasiswaan->alamat }}
                        </li>
                        <li>
                            <span>Jenis Kelamin:</span>
                            {{ auth()->user()->kemahasiswaan->jenis_kelamin }}
                        </li>
                        @elseif ((auth()->user()->role == 'anggota'))
                        <li>
                            <span>Phone Number:</span>
                            {{ auth()->user()->anggota_departemen->no_hp }}
                        </li>
                        <li>
                            <span>Alamat:</span>
                            {{ auth()->user()->anggota_departemen->alamat }}
                        </li>
                        <li>
                            <span>Jenis Kelamin:</span>
                            {{ auth()->user()->anggota_departemen->jenis_kelamin }}
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
