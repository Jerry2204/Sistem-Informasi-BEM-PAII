@extends('layouts.app')

@section('title', 'Forum Diskusi')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forum.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h6>Forum Detail</h6>
                <ol class="breadcrumb pl-0" style="background: transparent">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </div>
            <div class="col-md-12 p-4 mt-3 bg-white">
                <div class="">
                    <h4 class="heading mb-3 font-weight-bold">Question</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 d-flex mx-0 p-0">
                                <div class="rounded-circle border box-image">
                                    <img class="image-child"
                                        src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
                                        alt="...">
                                </div>
                                <div class="d-flex flex-column ml-3 my-1">
                                    <p class="text font-14 font-weight-bold m-0">{{ $forum->name }}</p>
                                    <span
                                        class="text-secondary font-weight-light text font-14 my-1">{{ Carbon\Carbon::parse($forum->created_at)->format('d M Y') }}
                                        | {{ $forum->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 pl-0">
                                <p class="text font-14 my-2" href="/forum/">{{ $forum->question }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12  p-4 mt-3 bg-white">
                <h4 class="heading font-weight-bold"> @php
                    echo count($forum->answer_forums);
                @endphp Answer</h4>
                @foreach ($forum->answer_forums as $item)
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 d-flex mx-0 p-0">
                                    <div class="rounded-circle border box-image">
                                        <img class="image-child"
                                            src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
                                            alt="...">
                                    </div>
                                    <div class="d-flex flex-column ml-3 my-1">
                                        <p class="text font-14 font-weight-bold m-0">{{ $item->name }}</p>
                                        <span
                                            class="text-secondary font-weight-light text font-14 my-1">{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                            | {{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12 pl-0">
                                    <p class="text font-14 my-2" href="/forum/">{{ $item->answer }}</p>
                                    @if (Auth::check())
                                        <a class="text font-14 mt-2" href="#" data-toggle="collapse"
                                            data-target="#collapseExample{{ $item->id }}" aria-expanded="false"
                                            aria-controls="collapseExample">Reply</a>
                                        <div class="collapse" id="collapseExample{{ $item->id }}">
                                            <div class="card card-body text px-0 py-0 p-3 font-14 mt-3">
                                                <form method="POST" action="{{ route('add_reply_forum', $forum->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="parent_id" value="{{ $item->id }}">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="font-14">Message</label>
                                                            <textarea class="form-control text font-14  @error('answer') is-invalid @enderror" name="answer" 
                                                            rows="3"></textarea>
                                                        @error('answer')
                                                            <p class="text text-danger font-14 mt-3">Input harus di isi</p>
                                                        @enderror
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-masuk font-14">Kirim</button>
                                                </form>
                                            </div>
                                        @else
                                            <a class="text font-14 mt-2" type="button" data-toggle="modal"
                                                data-target="#exampleModal">Reply</a>
                                    @endif
                                </div>
                                @foreach ($item->child as $item_child)
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end">
                                            <div class="col-12 pl-4">
                                                <div class="my-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12 d-flex mx-0 p-0">
                                                                <div class="rounded-circle border box-image">
                                                                    <img class="image-child"
                                                                        src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
                                                                        alt="...">
                                                                </div>
                                                                <div class="d-flex flex-column ml-3 my-1">
                                                                    <p class="text font-14 font-weight-bold m-0">
                                                                        {{ $item_child->name }}
                                                                    </p>
                                                                    <span
                                                                        class="text-secondary font-weight-light text font-14 my-1">{{ Carbon\Carbon::parse($item_child->created_at)->format('d M Y') }}
                                                                        |
                                                                        {{ $item_child->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 pl-0">
                                                                <p class="text font-14 my-2" href="/forum/">
                                                                    {{ $item_child->answer }}</p>
                                                                @if (Auth::check())
                                                                    <a class="text font-14 mt-2" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseExample{{ $item_child->id }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseExample">Reply</a>
                                                                    <div class="collapse"
                                                                        id="collapseExample{{ $item_child->id }}">
                                                                        <div
                                                                            class="card card-body text px-0 py-0 p-3 font-14 mt-3">
                                                                            <form method="POST"
                                                                                action="{{ route('add_reply_forum', $forum->id) }}">
                                                                                @csrf
                                                                                <input type="hidden" name="parent_id"
                                                                                    value="{{ $item->id }}">
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlTextarea1"
                                                                                        class="font-14">Message</label>
                                                                                        <textarea class="form-control text font-14  @error('answer') is-invalid @enderror" name="answer" id="exampleFormControlTextarea1"
                                                                                        rows="3"></textarea>
                                                                                    @error('answer')
                                                                                        <p class="text text-danger font-14 mt-3">Input harus di isi</p>
                                                                                    @enderror
                                                                                </div>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-masuk font-14">Kirim</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <a class="text font-14 mt-2" type="button"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal">Reply</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
            <hr>

            @if (Auth::check())
                <div class="text">
                    <h5 class="heading">Your Answer</h5>
                    <form method="POST" action="{{ route('add_reply_forum', $forum->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="font-14 text">Message</label>
                            <textarea class="form-control text font-14  @error('answer') is-invalid @enderror" name="answer" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                            @error('answer')
                                <p class="text text-danger font-14 mt-3">Input harus di isi</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-masuk font-14">Kirim</button>
                    </form>
                </div>
            @else
                <div class="text mt-5">
                    <p class="alert alert-danger text font-14">Anda
                        harus login terlebih dahulu jika ingin menjawab pertanyaan ini !!</p>
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-masuk text mt-2">Login</a>
                        </div>
                        <div class="mt-4 font-14 font-weight-bold d-flex align-items-center justify-content-center">
                            <p>&nbsp;&nbsp;Atau&nbsp;&nbsp;</p>
                        </div>
                        <div>
                            <a href="{{ route('register') }}" class="btn btn-danger btn-masuk text mt-2">Register</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title heading" id="exampleModalLabel">Hello People Power</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body border-0">
                            <p class="alert alert-danger text font-14">Anda
                                harus login terlebih dahulu jika ingin menjawab pertanyaan ini !!</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-masuk text mt-2">Login</a>
                                </div>
                                <div class="mt-4 font-14 font-weight-bold d-flex align-items-center justify-content-center">
                                    <p>&nbsp;&nbsp;Atau&nbsp;&nbsp;</p>
                                </div>
                                <div>
                                    <a href="{{ route('register') }}"
                                        class="btn btn-danger btn-masuk text mt-2">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
