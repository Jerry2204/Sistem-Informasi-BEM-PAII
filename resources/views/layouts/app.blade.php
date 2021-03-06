<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/activity.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/footer.css') }}">

    @yield('css')

    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @livewireStyles
    @yield('styles')

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top position-sticky  w-100">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse ml-auto navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav navigation-link">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                          </a>
                          <ul class="dropdown-menu dropdown-home" aria-labelledby="navbarDropdownMenuLink">
                            <li class="w-100">
                                <a class="dropdown-item text py-2" href="{{ route('about_us') }}">Tentang Kami</a>
                            </li>
                            <li class="w-100">
                                <a class="dropdown-item text py-2" href="{{ route('keuangan') }}">Keuangan</a>
                            </li>
                            <li class="dropdown-submenu w-100 dropdownku">
                              <a class="dropdown-item dropdown-toggle text py-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departemen</a>
                              <ul class="dropdown-menu dropdown-departemen">
                                @php
                                use App\Models\Departemen;
                                $departemens = Departemen::all();
                                @endphp
                                @foreach ($departemens as $departemen)
                                <li class="w-100">
                                    <a class="dropdown-item text py-2" href="{{ route('departemen.about', $departemen->id)}}">{{ $departemen->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            </li>
                            <li class="w-100">
                                <a class="dropdown-item text py-2" href="{{ route('sejarah_kepengurusan') }}">Sejarah Kepengurusan</a>
                            </li>
                          </ul>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activity') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('prestasi') }}">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('forum') }}">Forum</a>
                    </li>
                    @auth
                    @if(auth()->user()->role == 'umum')
                        <li class="nav-item m-0">
                            <a href="{{ route('logout') }}" class="btn btn-primary btn-masuk">Keluar</a>
                        </li>
                    @else
                        <li class="nav-item m-0">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-masuk">Masuk</a>
                        </li>
                    @endif
                    @endauth
                    @guest
                        <li class="nav-item m-0">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-masuk">Masuk</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const listItem = document.querySelectorAll('li');
        const menuLength = menuItem.length;
        console.log(menuLength);
        let i;
        for(i = 0; i < menuLength; i++){
            if(menuItem[i].href == currentLocation){
                menuItem[i].className = "nav-link active";
                console.log('halaman aktif');
            }
        }
    </script>

    @yield('content')

    <footer class="footer mt-5 shadow bg-white">
        <div class="col-12">
            <div class="container py-3">
                <div class="row">
                    <div class="col-12 col-md-5 px-0 pr-5">
                        <div class="d-flex align-items-center">
                            <img class="footer-image" src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}"
                                class="d-inline-block align-top" alt="">
                            <h5 class="heading font-weight-bold ml-3">BEM IT DEL</h5>
                        </div>
                        <p class="text my-3 font-14">Institut Teknologi Del berkunjung ke salah satu sekolah yang ada di
                            Kabupaten Simalungun guna mengajarkan pentingnya teknologi pada masa sekarang ini.</p>
                    </div>
                    <div class="col-12 col-md-2 d-flex flex-column py-4 text px-0">
                        <h5 class="heading font-weight-bold">Info</h5>
                        <a href="{{ route('about_us') }}" class="mt-2 text-dark font-14">Tentang Kami</a>
                        <a href="{{ route('blog') }}" class="mt-2 text-dark font-14">Blog</a>
                        <a href="https://wa.me/6282276858074" class="mt-2 text-dark font-14">Kontak</a>
                    </div>
                    <div class="col-12 col-md-2 d-flex flex-column py-4 text px-0">
                        <h5 class="heading font-weight-bold">Link Terkait</h5>
                        <a href="https://www.del.ac.id/" target="_blank" class="mt-2 text-dark font-14">Institut Teknologi Del</a>
                        <a href="https://www.del.or.id/" target="_blank" class="mt-2 text-dark font-14">Yayasan Del</a>
                    </div>
                    <div class="contact col-12 col-md-3 d-flex flex-column py-4 text px-3">
                        <h5 class="heading font-weight-bold">kontak</h5>
                        <p class="mt-2 text-dark font-14">Jl. P.I Del, Sitoluama Laguboti, Sumatra Utara, Indonesia</p>
                        <p class="text-dark font-14"><a href="https://wa.me/6282276858074" target="_blank" class="text text-decoration-none">+62 822 - 7685 - 8074</a></p>
                        <div class="d-flex flex-row">
                            <a href="https://www.facebook.com/bem.itdel" target="_blank" class="mr-4 h4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/bem.itdel/" target="_blank" class="h4 mr-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://twitter.com/bem_itdel" target="_blank" class="h4">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 bottom-footer text-center text-light">
            <p class="m-0">Copyright 2021 BEM IT Del. All Right Served</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="{{ asset('assets/js/home.js') }}"></script>
    @livewireScripts
    @yield('script')
</body>

</html>
