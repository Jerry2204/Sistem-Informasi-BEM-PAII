<div class="row">
    {{-- Session --}}
    @if (session()->has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Sukses',
            text: "{{ session('message') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif

    <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
        <div class="pd-20 card-box">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-blue @if (!$statusUpdate) active @endif " data-toggle="tab" href="#home" role="tab" aria-selected="@if ($statusUpdate) false @else true @endif">Daftar Kemahasiswaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Kemahasiswaan</a>
                    </li>
                    @if ($statusUpdate)
                    <li class="nav-item">
                        <a class="nav-link text-blue @if ($statusUpdate) active @endif" data-toggle="tab" href="#profileUpdate" role="tab" aria-selected="true">Ubah Kemahasiswaan</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade @if (!$statusUpdate) active show @endif" id="home" role="tabpanel">
                        <div class="pd-20 table-responsive">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Daftar Kemahasiswaan</h4>
                                    <p>Berikut ini merupakan daftar Kemahasiswaan Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kemahasiswaans as $kemahasiswaan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $kemahasiswaan->user->name }}</td>
                                        <td>{{ $kemahasiswaan->jenis_kelamin }}</td>
                                        <td>{{ $kemahasiswaan->no_hp }}</td>
                                        <td>{{ $kemahasiswaan->alamat }}</td>
                                        <td>
                                            <button wire:click="getKemahasiswaan({{ $kemahasiswaan->id }}, {{ $kemahasiswaan->user_id }})" class="btn btn-sm btn-primary">Ubah</button>
                                            <button wire:click="confirmation({{ $kemahasiswaan->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($statusUpdate)
                    <div class="tab-pane fade @if ($statusUpdate) active show @endif" id="profileUpdate" role="tabpanel">
                        <livewire:kemahasiswaan-update></livewire:kemahasiswaan-update>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <livewire:kemahasiswaan-create></livewire:kemahasiswaan-create>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

