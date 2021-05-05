@extends('layouts.app')

@section('title', 'Blog')

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
                                                src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
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
                                                                                src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
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
                                    harus login terlebih dahulu jika ingin menjawab pertanyaan ini !!</p>
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
                <div class="col-12 col-md-4 blog-archieve">
                    <div class="blog_post">
                        <h3 class="heading font-weight-bold mb-4">Postingan Terbaru</h3>
                        @foreach ($new_posts as $new_post)
                            <div class="my-2 border-bottom">
                                <a class="heading text-heading-child-post font-14"
                                    href="{{ route('single.post', $new_post->slug) }}">{{ $new_post->title }}</a>
                                <p class="text-secondary text-parag-child-post">{{ $new_post->kategori->nama_kategori }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="archieve mt-4">
                        <h3 class="heading font-weight-bold mb-4">Category</h3>
                        <div class="my-2 border-bottom pb-2 pt-0">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">Pendidikan</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">February 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">March 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">May 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">June 2021</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
