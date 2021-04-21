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
                <div class="row d-flex justify-content-between">
                    <div class="col-md-10 pl-0 pr-1 mt-3">
                        <div class="input-group mb-3 h-100">
                            <input type="text" class="form-control text font-14 h-100" placeholder="Search"
                                aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-md-2 px-0 mt-3">
                        <button class="btn w-100 text font-14 bg-red h-100 text-white" id="btn-add-forums"
                            data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus"></i>
                            Tambah
                            Pertanyaan</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog text font-14">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">New Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control font-14" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control font-14" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary font-14" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary font-14 font-weight-light">Send
                                message</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 p-4 mt-3 bg-white">
                @for ($i = 1; $i <= 7; $i++)
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
                                <p class="text font-14">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Ex
                                    neque facere dolorem nostrum
                                    inventore ratione, alias voluptate atque fuga dignissimos voluptatum explicabo cum
                                    doloribus
                                    nihil debitis aspernatur optio odio officia.</p>

                                <p class="text font-14 text-secondary mt-2 font-weight-bold">17 Agustus 2021</p>
                                <div class="d-flex flex-column">
                                    <a class="text font-14 mr-4 mb-3" data-toggle="collapse"
                                        href="#collapseForumsDesc{{ $i }}" role="button" aria-expanded="false"
                                        aria-controls="collapseForumsDesc{{ $i }}" href="#"><i
                                            class="fas fa-comment-alt"></i> &nbsp;Answer</a>
                                    <div class="collapse text font-14" id="collapseForumsDesc{{ $i }}">
                                        Some placeholder content for the collapse component. This panel is hidden by default
                                        but revealed when the user activates the relevant trigger.
                                        Some placeholder content for the collapse component. This panel is hidden by default
                                        but revealed when the user activates the relevant trigger.
                                        Some placeholder content for the collapse component. This panel is hidden by default
                                        but revealed when the user activates the relevant trigger.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endfor
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/js/forums-faq.js') }}"></script>
@endsection
