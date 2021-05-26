@extends('systemLayout.app')

@section('title', 'Forums')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Forums</h4>
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

    <div class="pd-20 card-box mb-30">
        <div class="pd-0">
            <h4 class="text-blue h4">Data Table with Export Buttons</h4>
        </div>
        <div class="pb-20">
            <table class="table data-table-export nowrap font-14 text">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Email</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Start Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">Gloria F. Mead</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>a829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>2829 Trainer Avenue Peoria, IL 61602 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">Zicoaritonang@gmail.com</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802 </td>
                        <td>29-03-2018</td>
                        <td>
                            <div class="d-flex justify-content-between" style="width: 200px">
                                <button class="btn btn-primary font-14">Answer</button>
                                <button class="btn btn-danger font-14">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
