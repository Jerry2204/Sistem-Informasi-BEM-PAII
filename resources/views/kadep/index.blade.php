@extends('systemLayout.app')

@section('title', 'Kadep')

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
<livewire:kadep-index></livewire:kadep-index>
@endsection

@section('scripts')
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
    window.addEventListener('swal:confirm', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    window.livewire.emit('destroy', event.detail.id);
                    Swal.fire({
                        title: 'Sukses',
                        text: "Data Berhasil dihapus",
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
    })
</script>
@endsection
