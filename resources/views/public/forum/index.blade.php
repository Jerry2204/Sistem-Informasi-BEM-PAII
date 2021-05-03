@extends('layouts.app')

@section('title', 'Forum Diskusi')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forum.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h6>Forum Diskusi</h6>
                <ol class="breadcrumb pl-0" style="background: transparent">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </div>

            <div class="col-md-12 bg-white shadow-sm p-4">
                <h3 class="heading font-weight-bold">Forum Diskusi</h3>
                <p class="text mt-3 font-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porttitor tellus
                    porttitor non nullam dui.
                    Consectetur in aliquet tellus risus elit pretium. In nunc tincidunt sagittis sit massa odio. Viverra
                    quam nec diam tincidunt donec suspendisse consectetur. Praesent odio malesuada eu quis nisl nisl
                    fringilla neque adipiscing. Ridiculus eu velit euismod porttitor mauris aenean vitae donec.
                </p>
                <p class="text font-14"> A sit metus tellus sed justo est nisi. Molestie et vulputate hac malesuada. Lacinia
                    ultrices lectus sed
                    tempor. Ipsum convallis facilisi sagittis neque ut aliquam urna faucibus. Tellus, mi integer dolor nulla
                    nunc consectetur turpis. Id velit convallis massa aliquet. Tristique faucibus commodo, sed quis cursus a
                    et praesent sit. Leo odio morbi id est. Mi iaculis tortor amet lacus. Phasellus tempus nunc semper
                    pellentesque sit nulla nibh.</p>
            </div>

            <div class="col-md-12 form-forum">
                @livewire('forum-search-bar')
            </div>


            @if (Auth::check())
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog text font-14">
                        <form method="POST" action="{{ route('add_forum') }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">New Question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control font-14" name="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="text" class="form-control font-14" name="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Question:</label>
                                        <textarea class="form-control font-14" name="question"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary font-14"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary font-14 font-weight-light">Send
                                        message</button>
                                </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog text font-14">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">New Question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Silahkan login terlebih dahulu
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary font-14" data-dismiss="modal">Close</button>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-masuk font-14 font-weight-light">Login</a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>

        <div class="col-md-12 p-4 mt-3 bg-white">
            @foreach ($forum as $item)
            <div>
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-start">
                        <div class="rounded-circle border box-image">
                            <img class="image-child"
                                src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
                                alt="...">
                        </div>
                    </div>
                    <div class="col-md-11 pl-0 forum-desc">
                        <p class="text font-14 font-weight-bold my-1">{{ $item->name }}</p>
                        <a class="text font-14" href="/forums/{{ $item->id }}">{{ $item->question }}</a>
                        <p class="text font-12 text-secondary mt-2 font-weight-regular" style="opacity: 1">{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                        <div class="d-flex flex-column">
                            <p class="text font-14 mr-4 mb-3"><i class="fas fa-comment-alt"></i> &nbsp;@php
                                echo count($item->answer_forums);
                            @endphp Answer&nbsp;<i
                                    class="fa fa-eye"></i> &nbsp;5 Views </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/js/forums-faq.js') }}"></script>
@endsection
