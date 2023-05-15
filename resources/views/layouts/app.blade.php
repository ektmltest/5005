<!DOCTYPE html>
@if (app()->getLocale() == 'en')
    <html lang="en" dir="ltr">
@else
    <html lang="ar" dir="rtl">
@endif

<head>
    @include('layouts.head')
</head>

<body>
    
    @yield('content')

    @include('layouts.footer')
</body>

</html>