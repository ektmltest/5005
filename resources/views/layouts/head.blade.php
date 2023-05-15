<!-- Basic Page Needs -->
<meta charset="UTF-8">
<meta name="description" content="Hotan Multipurpose HTML Template for Saas & Agency">
<meta name="author" content="Webhops">
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- IE Browser Support -->
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Page Title -->
<title>@yield('title')</title>

<!-- Turbo JS -->
<script type="module">
import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
</script>

<!-- Favicon-->
<link rel="shortcut icon" type="image/x-icon" href="http://placehold.it/32x32">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
rel="stylesheet">
<!-- =========== CSS Files =========== -->
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
<!-- Box Icons -->
<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}">
<!-- Lity -->
<link rel="stylesheet" href="{{ asset('assets/vendors/lity/css/lity.min.css') }}">
<!-- Style Css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Modernizer Script for old Browsers -->
<script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>

@livewireStyles()
