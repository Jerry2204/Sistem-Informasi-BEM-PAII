@extends('layouts.app')

@section('title', 'Single Post')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="row d-flex justify-content-between">
                <div class="col-md-12">
                    <h6>Blog Detail</h6>
                    <ol class="breadcrumb bg-white pl-0 text" style="background: transparent !important">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
                <div class="col-12 col-md-7">
                    <h3 class="mb-4 heading font-weight-bold">{{ $post->title }}</h3>
                    <p class="text font-14 text-secondary mb-2"><i class="fas fa-user-alt"></i>&nbsp;
                        {{ $post->user->name }}</p>
                    <p class="text font-14 text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp;
                        {{ $post->updated_at->format('D, d M Y') }} |
                        {{ $post->kategori ? $post->kategori->nama_kategori : 'Tidak ada kategori' }}</p>
                    <img src="{{ $post->thumbnail() }}" class="img-fluid" alt="Responsive image">
                    <div class="my-4 text-justify text font-14">
                        {!! $post->content !!}
                    </div>
                    <hr>

                    <div class="mt-4">
                        <h5 class="heading font-weight-bold mb-3">Komentar</h5>
                        <div class="row">
                            @forelse ($post->comments as $comment)
                                <div class="col-md-12">
                                    <div class="col-md-12 d-flex mx-0 p-0">
                                        <div class="rounded-circle border box-image">
                                            <img class="image-child"
                                            src="{{ asset('assets/images/profil/profile.jpeg') }}"
                                                alt="...">
                                        </div>
                                        <div class="d-flex flex-column ml-3 my-1">
                                            <p class="text font-14 font-weight-bold m-0">{{ $comment->name }}</p>
                                            <span class="text-secondary font-weight-light text font-14 my-1">
                                                {{ Carbon\Carbon::parse($comment->created_at)->format('d M Y') }}
                                                | {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl-0">
                                        <p class="text font-14 my-2">
                                            {{ $comment->comment }}
                                        </p>
                                        <a class="text font-14 mt-2" href="#" data-toggle="collapse"
                                            data-target="#collapseExample{{ $comment->id }}" aria-expanded="false"
                                            aria-controls="collapseExample">Reply</a>
                                        <div class="collapse" id="collapseExample{{ $comment->id }}">
                                            <div class="card card-body text px-0 py-0 p-3 font-14 mt-3">
                                                @if (Auth::check())
                                                    <form method="POST"
                                                        action="{{ route('add_comment_blog', $post->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="font-14">Message</label>
                                                            <textarea class="form-control font-14" name="comment"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-masuk font-14">Kirim</button>
                                                    </form>
                                                @else
                                                    <p class="alert alert-danger text font-14">Anda
                                                        harus login terlebih dahulu jika ingin menjawab pertanyaan ini !!
                                                    </p>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-primary btn-masuk text mt-2">Login</a>
                                                        </div>
                                                        <div
                                                            class="mt-4 font-14 font-weight-bold d-flex align-items-center justify-content-center">
                                                            <p>&nbsp;&nbsp;Atau&nbsp;&nbsp;</p>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('register') }}"
                                                                class="btn btn-danger btn-masuk text mt-2">Register</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @foreach ($comment->child as $item)
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-end">
                                                    <div class="col-12 pl-4">
                                                        <div class="my-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12 d-flex mx-0 p-0">
                                                                        <div class="rounded-circle border box-image">
                                                                            <img class="image-child"
                                                                            src="{{ asset('assets/images/profil/profile.jpeg') }}"
                                                                                alt="...">
                                                                        </div>
                                                                        <div class="d-flex flex-column ml-3 my-1">
                                                                            <p class="text font-14 font-weight-bold m-0">
                                                                                {{ $item->name }}
                                                                            </p>
                                                                            <span
                                                                                class="text-secondary font-weight-light text font-14 my-1">
                                                                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                                                |
                                                                                {{ $item->created_at->diffForHumans() }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 pl-0">
                                                                        <p class="text font-14 my-2" href="/forum/">
                                                                            {{ $item->comment }}
                                                                        </p>
                                                                        <a class="text font-14 mt-2" href="#"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapseExample1"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseExample">Reply</a>
                                                                        <div class="collapse" id="collapseExample1">
                                                                            <div
                                                                                class="card card-body text px-0 py-0 p-3 font-14 mt-3">
                                                                                @if (Auth::check())
                                                                                    <form method="POST"
                                                                                        action="{{ route('add_comment_blog', $post->id) }}">
                                                                                        <input type="hidden"
                                                                                            name="parent_id"
                                                                                            value="{{ $comment->id }}">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleFormControlTextarea1"
                                                                                                class="font-14">Message</label>
                                                                                            <textarea
                                                                                                class="form-control font-14"
                                                                                                id="exampleFormControlTextarea1"
                                                                                                rows="3"
                                                                                                name="comment"></textarea>
                                                                                        </div>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary btn-masuk font-14">Kirim</button>
                                                                                    </form>
                                                                                @else
                                                                                    <p
                                                                                        class="alert alert-danger text font-14">
                                                                                        Anda
                                                                                        harus login terlebih dahulu jika
                                                                                        ingin
                                                                                        menjawab pertanyaan ini !!</p>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <a href="{{ route('login') }}"
                                                                                                class="btn btn-primary btn-masuk text mt-2">Login</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mt-4 font-14 font-weight-bold d-flex align-items-center justify-content-center">
                                                                                            <p>&nbsp;&nbsp;Atau&nbsp;&nbsp;
                                                                                            </p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <a href="{{ route('register') }}"
                                                                                                class="btn btn-danger btn-masuk text mt-2">Register</a>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
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
                            @empty
                                <div class="col-md-12">
                                    <p class="text font-14">No Comment</p>
                                </div>
                            @endforelse
                        </div>
                        <hr>
                        @if (Auth::check())
                            <div class="text">
                                <h5 class="heading">Tambah Komentar</h5>
                                <form method="POST" action="{{ route('add_comment_blog', $post->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="font-14 text">Message</label>
                                        <textarea class="form-control text font-14" name="comment"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-masuk font-14">Kirim</button>
                                </form>
                            </div>
                        @else
                            <div class="text">
                                <p class="alert alert-danger text font-14">Anda
                                    harus login terlebih dahulu jika ingin menambah komentar !!</p>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('login') }}"
                                            class="btn btn-primary btn-masuk text mt-2">Login</a>
                                    </div>
                                    <div
                                        class="mt-4 font-14 font-weight-bold d-flex align-items-center justify-content-center">
                                        <p>&nbsp;&nbsp;Atau&nbsp;&nbsp;</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('register') }}"
                                            class="btn btn-danger btn-masuk text mt-2">Register</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4 blog-archieve border-left pl-5">
                    <div class="blog_post">
                        <h4 class="heading font-weight-bold mb-4">Postingan Terbaru</h4>
                        @forelse ($new_posts as $new_post)
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14 text-decoration-none" href="{{ route('single.post', $new_post->slug) }}">{{ $new_post->title }}</a>
                            <p class="text-secondary text-parag-child-post text">
                                {{ $new_post->kategori ? $new_post->kategori->nama_kategori : 'Tidak ada kategori' }}
                            </p>
                        </div>
                        @empty
                            <p class="text">Tidak ada postingan</p>
                        @endforelse
                    </div>

                    <div class="archieve mt-4">
                        <h4 class="heading font-weight-bold mb-4">Category</h4>
                        <div class="my-2 border-bottom pb-2 pt-0">
                            @forelse ($category as $item)
                            <a class="text-parag-child-archieve font-14 d-block mt-1 text-decoration-none text" href="{{ route('blog_kategori', $item->id) }}">{{ $item->nama_kategori }}</a>
                        @empty
                        <p>No Category</p>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
