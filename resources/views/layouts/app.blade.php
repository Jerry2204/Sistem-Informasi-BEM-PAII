<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        nav{
            height: 65px;
            font-family: 'Montserrat';
            font-size: 14px;
            line-height: 140%;
            font-weight: bold;
            padding: 12px 100px;
            background-color: white;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        }

        nav img{
            width: 45px;
            height: 45px;
            margin: 0 0 0 100px;
        }
        .navigation-link{
            margin: 0 100px 0 0;
        }

        .navigation-link li{
            margin-right: 20px;
        }

        .btn-masuk{
            width: 182px;
            height: 40px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" class="d-inline-block align-top" alt="">
        </a>
        <ul class="nav justify-content-end navigation-link">
            <li class="nav-item">
              <a class="nav-link active" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kegiatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Prestasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Tentang Kami</a>
            </li>

            <li class="nav-item">
                <a href="" class="btn btn-primary btn-masuk">Masuk</a>
            </li>
          </ul>
    </nav>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
