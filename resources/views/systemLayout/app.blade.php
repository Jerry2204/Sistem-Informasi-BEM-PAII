<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">

    <!-- Livewire Style -->
    @livewireStyles
    @yield('styles')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	{{-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('assets/images/deskapp-logo.svg') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> --}}

    @include('systemLayout.navbar')

    @include('systemLayout.rightSidebar')

    @include('systemLayout.leftSidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
            @yield('content')
		</div>
	</div>

    <div class="footer-wrap pd-20 mb-20 card-box">
        Copyright&copy;{{ date('Y') }} - Badan Eksekutif Mahasiswa Institut Teknologi Del
    </div>
	<!-- js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="{{ asset('assets/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/scripts/layout-settings.js') }}"></script>
	{{-- <script src="{{ asset('assets/apexcharts/apexcharts.min.js') }}"></script> --}}
	<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/responsive.bootstrap4.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.js"></script>
	<script src="{{ asset('assets/scripts/dashboard.js') }}"></script>
	@livewireScripts
	@yield('scripts')
</body>
</html>
