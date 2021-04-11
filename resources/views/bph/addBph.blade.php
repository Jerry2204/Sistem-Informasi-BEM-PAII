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
                    <li class="breadcrumb-item disabled"><a>User</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bph') }}">BPH</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah BPH</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    
</div>
@endsection
