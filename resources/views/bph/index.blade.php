@extends('systemLayout.app')

@section('title', 'BPH')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Badan Pengurus Harian</h4>
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
<livewire:b-p-h-index></livewire:b-p-h-index>
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
<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endsection
