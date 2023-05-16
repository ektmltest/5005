<!-- JS Files -->
<script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap v4 -->
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<!-- Appear -->
<script src="{{ asset('assets/vendors/appear/js/jquery.appear.js') }}"></script>
<!-- Lity -->
<script src="{{ asset('assets/vendors/lity/js/lity.min.js') }}"></script>
<!-- Parallax -->
<script src="{{ asset('assets/vendors/parallax/js/jquery-parallax.js') }}"></script>
<!-- Parallax -->
<script src="{{ asset('assets/js/core.js') }}"></script>

<!-- Turbo JS -->
<script type="module">
    import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
</script>

@if (App::getLocale() == 'ar')
<script src="{{ asset('assets/js/core_rtl.js') }}"></script>
@endif