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
                        <a class="nav-link text-blue @if (!$statusUpdate) active @endif" data-toggle="tab" href="#home" role="tab" aria-selected="@if ($statusUpdate) false @else true @endif">Daftar Kategori Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tambah Kategori Blog</a>
                    </li>
                    @if ($statusUpdate)
                    <li class="nav-item">
                        <a class="nav-link text-blue @if ($statusUpdate) active @endif" data-toggle="tab" href="#profileUpdate" role="tab" aria-selected="true">Ubah Kategori Blog</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade @if (!$statusUpdate) active show @endif" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Kategori Blog</h4>
                                    <p>Berikut ini merupakan daftar Kategori Blog</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->nama_kategori }}</td>
                                        <td>
                                            <button wire:click="getKategori({{ $category->id }})" class="btn btn-sm btn-primary">Ubah</button>
                                            <button wire:click="confirmation({{ $category->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($statusUpdate)
                    <div class="tab-pane fade active show " id="profileUpdate" role="tabpanel">
                        <livewire:kategori-update></livewire:kategori-update>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <livewire:kategori-create></livewire:kategori-create>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
