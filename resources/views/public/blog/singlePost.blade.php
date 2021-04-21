@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container">

        <div class="mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h6>Blog Detail</h6>
                    <ol class="breadcrumb bg-white pl-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
                <div class="col-12 col-md-8">
                    <img src="https://www.wallpaperflare.com/static/176/805/287/coffee-cafe-table-food-wallpaper-preview.jpg"
                        class="img-fluid" alt="Responsive image">

                    <h3 class="mt-4 heading font-weight-bold">{{ $post->title }}</h3>
                    <small class="mt-0"><i class="fas fa-user"></i> {{ $post->user->name }} | {{ $post->created_at->format('D, d M Y') }}</small>

                    <div class="my-4 text-justify text">
                       {!! $post->content !!}
                    </div>
                </div>
                <div class="col-12 col-md-4 blog-archieve">
                    <div class="blog_post">
                        <h3 class="heading font-weight-bold mb-4">Latest Post</h3>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                    </div>

                    <div class="archieve mt-4">
                        <h3 class="heading font-weight-bold mb-4">Archieve</h3>
                        <div class="my-2 border-bottom pb-2 pt-0">
                            <a class="text-secondary text-parag-child-archieve" href="#">January 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve" href="#">February 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve" href="#">March 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve" href="#">May 2021</a>
                        </div>
                        <div class="my-2 border-bottom py-2">
                            <a class="text-secondary text-parag-child-archieve" href="#">June 2021</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
