<!DOCTYPE html>
@if(app()->getLocale() == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/newlogo.png') }}"> --}}
    <!-- Bootstrap Css -->
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('dashboard/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @endif
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <!-- Icons Css -->
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->

    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('dashboard/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('dashboard/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @endif
</head>
<body>
    <div id="layout-wrapper">

