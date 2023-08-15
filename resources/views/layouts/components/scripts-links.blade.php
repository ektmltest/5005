<!-- Bootstrap v4 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ asset('assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<!-- Appear -->
<script src="{{ asset('assets/vendors/appear/js/jquery.appear.js') }}"></script>
<!-- Lity -->
<script src="{{ asset('assets/vendors/lity/js/lity.min.js') }}"></script>
{{-- sticky --}}
<script src="{{ asset('assets/vendors/sticky/js/hc-sticky.js') }}"></script>
<!-- Parallax -->
<script src="{{ asset('assets/vendors/parallax/js/jquery-parallax.js') }}"></script>

{{-- * portfolio --}}
<!-- Magnific -->
<script src="{{asset('assets/vendors/magnific/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Isotope-->
<script src="{{asset('assets/vendors/isotope/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendors/isotope/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/portfolio.js')}}"></script>
<!-- Parallax -->
<script src="{{ asset('assets/js/core.js') }}"></script>
{{-- projects --}}
{{-- <script src="{{asset('assets/js/projects.js')}}"></script> --}}

<script src="{{ asset('dashboard/assets/libs/swiper/js/swiper-bundle.min.js') }}"></script>
<script>
    var swiper;

    var initSwiper = () => {
        swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            // loop: true,

            // Navigation arrows
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },

            pagination: {
                el: '.swiper-pagination',
            },

            autoplay: {
                delay: 1000,
            },

            freeMode: true,
            slidesPerView: 6,
            spaceBetween: 30,
        });
    }

    // Update swiper on window resize
    function updateSwiper() {
        if (window.innerWidth < 576) { // xs
            swiper.params.slidesPerView = 1; // Number of items on mobile
        } else if (window.innerWidth < 768) { // sm
            swiper.params.slidesPerView = 3; // Number of items on mobile
        } else if (window.innerWidth < 992) { // md
            swiper.params.slidesPerView = 3; // Number of items on mobile
        } else {
            swiper.params.slidesPerView = 6; // Number of items on desktop
        }
        swiper.update(); // Update Swiper instance
    }

    // Initial call
    initSwiper();
    updateSwiper();

    // Listen for window resize events
    window.addEventListener('resize', updateSwiper);

    window.addEventListener('initSwiper', initSwiper);
</script>

<!-- Turbo JS -->
{{-- <script type="module">
    import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
</script> --}}
