<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>BEM IT DEL</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

	<style>
		.logo-gambar{
			width: 50px;
		}
	</style>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('home') }}">
					<img class="logo-gambar" src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" alt="">
					<h5 class="mx-3">BEM IT DEL</h5>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{ route('register.umum') }}">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('assets/images/login-page-img.png') }}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login</h2>
						</div>
						<form action="{{ route('login') }}" method="POST">
                            @csrf
							<div class="input-group custom">
								<input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') form-control-danger @enderror" placeholder="@error('email') Email harus diisi @else Masukkan Email @enderror ">
                                @error('email')
                                @else
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
                                @enderror
							</div>
							<div class="input-group custom">
								<input type="password" name="password" class="form-control @error('password') form-control-danger @enderror form-control-lg" placeholder="@error('password') Password harus diisi @else ********** @enderror">
                                @error('password')
                                @else
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
                                @enderror
							</div>
                            @if (session('status'))
                            <div class="alert alert-danger">{{ session('status') }}</div>
                            @endif
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" name="remember" class="custom-control-input" id="remember">
										<label class="custom-control-label" for="remember">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
										{{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register.umum') }}">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('assets/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/scripts/layout-settings.js') }}"></script>
</body>
</html>
