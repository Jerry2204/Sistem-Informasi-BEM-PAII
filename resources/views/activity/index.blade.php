@extends('systemLayout.app')

@section('title', 'Kegiatan')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Kegiatan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="calendar-wrap">
            <div id='calendar'></div>
        </div>
        <!-- calendar modal -->
        <div id="modal-view-event" class="modal modal-top fade calendar-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="h4"><span class="event-icon weight-400"></span><span class="event-title"></span>
                            </h4>
                            <i class="fa fa-edit edit-button" data-toggle="tooltip" data-placement="bottom"
                                title="Edit Event"></i>
                        </div>
                        <div class="event-body"></div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div>
                            <form action="{{ route('delete_calendar') }}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" class="idCalendarEvent">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-view-event-add" class="modal modal-top
                                fade calendar-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="add-event" method="POST" action="{{ route('add_calendar') }}">
                        @csrf
                        <div class="modal-body">
                            <h4 class="text-blue h4 mb-10">Tambah Kegiatan</h4>
                            <div class="form-group">
                                <label>Judul Kegiatan</label>
                                <input type="text" class="form-control" name="title" id="name" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger error-message text font-14">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type='text' class="datetimepicker form-control" name="start" autocomplete="off"
                                    id="date-start" value="{{ old('start') }}">
                                @error('start')
                                    <div class="text-danger error-message text font-14">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type='text' class="datetimepicker form-control" name="end" autocomplete="off"
                                    id="date-end" value="{{ old('end') }}">
                                <div class="text-secondary error-message text font-14">*optional</div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea class="form-control" name="description"
                                    id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger error-message text font-14">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <select class="form-control" name="color" id="color">
                                    <option value="fc-bg-default">default</option>
                                    <option value="fc-bg-blue">biru</option>
                                    <option value="fc-bg-lightgreen">hijau</option>
                                    <option value="fc-bg-pinkred">Merah</option>
                                    <option value="fc-bg-deepskyblue">biru langit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Icon Kegiatan</label>
                                <select class="form-control" name="icon" id="icon">
                                    <option value="circle">lingkaran</option>
                                    <option value="cog">cog</option>
                                    <option value="group">group</option>
                                    <option value="suitcase">suitcase</option>
                                    <option value="calendar">calendar</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="{{ asset('assets/scripts/calendar-setting.js') }}"></script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#modal-view-event-add').modal();
            })
        </script>
    @endif
@endsection
