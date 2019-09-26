<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xuân Phi Ielts| @yield('title') </title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="image/logo1.jpg" />
	<link rel="stylesheet" type="text/css" href="lib/bootstrap_4.0.0/css/bootstrap.min.css">
	{{-- <link rel="stylesheet" type="text/css" href="css/reset-browser.css"> --}}
	<link rel="stylesheet" type="text/css" href="lib/fontawesome.5.7.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="lib/OwlCarousel2-2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="lib/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css">
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="lib/banner-slider/engine1/style.css" />
    <!-- End WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap_4.0.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="{{ asset('alertify/alertify.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('alertify/alertify.core.css') }}">
	<link rel="stylesheet" href="{{ asset('alertify/alertify.default.css') }}">
	<script src="{{ asset('alertify/alertify.min.js') }}"></script>
{{--Font--}}
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap&subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
    {{--  <script src="https://kit.fontawesome.com/2476b12f4d.js"></script>  --}}
</head>
<body>

@if(session('thongbao'))
	<script type="text/javascript">
		alertify.success('{{ session('thongbao') }}');
	</script>
@endif
@if(session('error'))
	<script type="text/javascript">
		alertify.error('{{ session('error') }}');
	</script>
@endif
@if(count($errors) > 0)
	<script type="text/javascript">
		@foreach($errors->all() as $err)
		alertify.error('{{ $err }}');
		@endforeach
	</script>

@endif

@include('client.layouts.header')
@yield('content')
@include('client.layouts.footer')
<script>
	$(document).ready(function () {
		$('.menu #contact-li').on('click', function(event) {
			event.preventDefault();
			$('html,body').animate({scrollTop: $('#contact').offset().top}, 1500);
		});
		$('.menu #khoahoc-li').on('click', function(event) {
			event.preventDefault();
			$('html,body').animate({scrollTop: $('#khoahoc').offset().top}, 1500);
		});
		$('.menu #blog-li').on('click', function(event) {
			event.preventDefault();
			$('html,body').animate({scrollTop: $('#blog').offset().top}, 1500);
		});
		$('.menu #library-li').on('click', function(event) {
			event.preventDefault();
			$('html,body').animate({scrollTop: $('#library').offset().top}, 1500);
		});
	});
</script>
</body>
</html>
