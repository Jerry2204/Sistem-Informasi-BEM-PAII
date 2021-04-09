@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h3 class="heading font-weight-bold">Berita dan Informasi</h3>
        </div>
        <div class="card-columns pt-5">
            <div class="card">
                <img class="card-img-top" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image cap">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card p-3">
                <blockquote class="blockquote mb-0 card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image cap">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card bg-primary text-white text-center p-3">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                    <footer class="blockquote-footer">
                        <small>
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image">
            </div>
            <div class="card p-3 text-right">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This is a wider card with supporting text below as a natural lead-in to additional
                        content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image cap">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card p-3">
                <blockquote class="blockquote mb-0 card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image cap">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card bg-primary text-white text-center p-3">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                    <footer class="blockquote-footer">
                        <small>
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img" src="https://wallpaperaccess.com/full/30100.jpg" alt="Card image">
            </div>
            <div class="card p-3 text-right">
                <blockquote class="blockquote mb-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer text-light">
                        <small class="text-muted text-light">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </small>
                    </footer>
                </blockquote>
            </div>
            <div class="card">
                <div class="card-body">
                    <a class="card-title heading font-weight-bold" href="{{ route('blog_detail')}}">Card title that wraps to a new line</a>
                    <p class="card-text mt-2">This is a wider card with supporting text below as a natural lead-in to additional
                        content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
