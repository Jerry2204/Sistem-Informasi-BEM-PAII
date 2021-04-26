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
                    <p class="text font-14 text-secondary mb-2"><i class="fas fa-user-alt"></i>&nbsp; {{ $post->user->name }}</p>
                    <p class="text font-14 text-secondary"><i class="fas fa-calendar-alt"></i>&nbsp; {{ $post->updated_at->format('D, d M Y') }} | {{ $post->kategori ? $post->kategori->nama_kategori : 'Tidak ada kategori' }}</p>
                    <img src="{{ $post->thumbnail() }}"
                        class="img-fluid" alt="Responsive image">
                    <div class="my-4 text-justify text font-14">
                        {!! $post->content !!}
                    </div>

                    <h5 class="heading font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Justo eu
                        auctor arcu </h5>

                    <p class="my-4 text-justify text font-14">
                        Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed
                        odio
                        operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc
                        posthac,
                        sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras
                        mattis
                        iudicium purus sit amet fermentum. <br>
                        Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed
                        odio
                        operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc
                        posthac,
                        sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras
                        mattis
                        iudicium purus sit amet fermentum. <br>
                        Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed
                        odio
                        operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc
                        posthac,
                        sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras
                        mattis
                        iudicium purus sit amet fermentum.
                    </p>
                </div>
                <div class="col-12 col-md-4 blog-archieve">
                    <div class="blog_post">
                        <h3 class="heading font-weight-bold mb-4">Postingan Terbaru</h3>
                        @foreach ($new_posts as $new_post)
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="#">{{ $new_post->title }}</a>
                            <p class="text-secondary text-parag-child-post">{{ $new_post->kategori->nama_kategori }}</p>
                        </div>
                        @endforeach
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                        <div class="my-2 border-bottom">
                            <a class="heading text-heading-child-post font-14" href="#">Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco</a>
                            <p class="text-secondary text-parag-child-post">Event</p>
                        </div>
                    </div>

                    <div class="archieve mt-4">
                        <h3 class="heading font-weight-bold mb-4">Archieve</h3>
                        <div class="my-2 border-bottom pb-2 pt-0">
                            <a class="text-secondary text-parag-child-archieve font-14" href="#">January 2021</a>
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
