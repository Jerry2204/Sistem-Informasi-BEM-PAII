@extends('systemLayout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Detail Forums</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forums</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    <div class="col-sm-12 col-md-12 mb-30 ml-0 pb-3 px-0">
        <div class="card card-box mt-3">
            <div class="card-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @livewire('chats')             
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/scripts/datatable-setting.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.dt-buttons.btn-group.flex-wrap').css({
                'padding': '0',
                'marginTop': '20px',
                'marginBottom': '20px',
            });
        })

    </script>
@endsection
