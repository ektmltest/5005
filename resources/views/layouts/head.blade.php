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

{{-- styles --}}
@component('layouts.components.styles-links')
@endcomponent

<!-- Modernizer Script for old Browsers -->
<script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>

@livewireStyles()
