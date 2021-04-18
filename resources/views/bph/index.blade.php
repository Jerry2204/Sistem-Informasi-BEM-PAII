@extends('systemLayout.app')

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
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('assets/sweetalert2/sweet-alert.init.js') }}"></script>
@endsection
