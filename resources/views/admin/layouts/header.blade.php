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

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">

    <!-- App favicon -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/newlogo.png') }}"> --}}
    <!-- Bootstrap Css -->
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('dashboard/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @endif
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <!-- Icons Css -->
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->

    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('dashboard/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('dashboard/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @endif

    <link href="{{ asset("dashboard/assets/libs/select2/css/select2.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("dashboard/assets/libs/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}" rel="stylesheet" />

    @livewireStyles()

    <style>
        .copy-clipboard {
            cursor: pointer;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }
    </style>

    <script>
        function showSpinner(id) {
            elem = document.getElementById(id);
            elem.classList.remove('d-none');
        }
    </script>

</head>
<body>
    <div id="layout-wrapper">


