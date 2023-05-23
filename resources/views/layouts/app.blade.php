{{-- <!DOCTYPE html>
@if (app()->getLocale() == 'en')
    <html lang="en" dir="ltr">
@else
    <html lang="ar" dir="rtl">
@endif --}}
<!DOCTYPE html>
<html>

<head>
    @include('layouts.head')

    <script src="{{ asset('assets/js/topbar.js') }}"></script>
</head>

<body>

    @yield('content')

    @include('layouts.footer', ['auth' => isset($auth)])
</body>

</html>
