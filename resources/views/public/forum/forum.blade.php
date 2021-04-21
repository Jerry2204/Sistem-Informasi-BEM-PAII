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
                <div>
                    <div class="row">
                        <div class="col-md-1 d-flex justify-content-center">
                            <div class="rounded-circle border box-image">
                                <img class="image-child"
                                    src="https://upload.wikimedia.org/wikipedia/commons/1/18/Mark_Zuckerberg_F8_2019_Keynote_%2832830578717%29_%28cropped%29.jpg"
                                    alt="...">
                            </div>
                        </div>
                        <div class="col-md-11 pl-0">
                            <p class="text font-14" href="/forum/">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Ex
                                neque facere dolorem nostrum
                                inventore ratione, alias voluptate atque fuga dignissimos voluptatum explicabo cum
                                doloribus
                                nihil debitis aspernatur optio odio officia.</p>

                            <p class="text font-14 text-secondary mt-2 font-weight-bold">17 Agustus 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
