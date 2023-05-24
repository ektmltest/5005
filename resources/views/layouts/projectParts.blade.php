<!DOCTYPE html>
<html>
<head>
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
<!-- Favicon-->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo_ektml.webp')}}">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

{{-- styles --}}
@component('layouts.components.styles-links')
@endcomponent

<!-- Modernizer Script for old Browsers -->
<script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>

@livewireStyles()
</head>

<body>

    @yield('content')

    @include('layouts.footer', ['auth' => isset($auth)])
</body>

</html>
