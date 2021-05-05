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
                        <a class="nav-link text-blue @if (!$statusUpdate) active @endif" data-toggle="tab" href="#home" role="tab" aria-selected="@if ($statusUpdate) false @else true @endif">Daftar Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Jabatan</a>
                    </li>
                    @if ($statusUpdate)
                    <li class="nav-item">
                        <a class="nav-link text-blue @if ($statusUpdate) active @endif" data-toggle="tab" href="#profileUpdate" role="tab" aria-selected="true">Ubah Jabatan</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade @if (!$statusUpdate) active show @endif" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Jabatan</h4>
                                    <p>Berikut ini merupakan daftar Jabatan BPH BEM Institut Teknologi Del</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Jabatan</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jabatan as $position)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $position->jabatan }}</td>
                                        <td>
                                            <button wire:click="getposition({{ $position->id }})" class="btn btn-sm btn-primary">Ubah</button>
                                            <button wire:click="confirmation({{ $position->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($statusUpdate)
                    <div class="tab-pane fade active show" id="profileUpdate" role="tabpanel">
                        <livewire:jabatan-update></livewire:jabatan-update>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <livewire:jabatan-create></livewire:jabatan-create>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
