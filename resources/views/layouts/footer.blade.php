<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-box">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="theme-details">
                        <a href="index.html">
                            <img src="http://placehold.it/360x416" alt="Hotan Template">
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Deserunt quia vero</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
                            <li><a href="#"><i class="bx bxl-twitter"></i></a></li>
                            <li><a href="#"><i class="bx bxl-behance"></i></a></li>
                            <li><a href="#"><i class="bx bxl-linkedin"></i></a></li>
                            <li><a href="#"><i class="bx bxl-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="foot-box sitemap">
                        <h4>Sitemap</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Platform</a></li>
                            <li><a href="#">Customers</a></li>
                            <li><a href="#">Why Us?</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="foot-box contact-details">
                        <h4>Contact Us</h4>
                        <ul class="list-unstyled">
                            <li>
                                <i class='bx bx-map'></i>
                                Haywards Heath, Mid Sussex, UK
                            </li>
                            <li>
                                <i class='bx bx-mail-send'></i>
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                            <li>
                                <i class='bx bx-phone'></i>
                                <a href="tel:+447990704483">+44-799-070-4483</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="foot-box newsletter">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Deserunt quia vero</p>
                        <form autocomplete="off" action="#">
                            <div class="input-box">
                                <div class="floating-label-wrap">
                                    <input type="email" class="floating-label-field floating-label-field--s3"
                                        id="field-6" placeholder="Subscribe">
                                    <label for="field-6" class="floating-label">E-Mail Address</label>
                                    <button type="submit"><i class='bx bx-send'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col-xl-6">
                    <div class="copyright-txt">
                        <span>Copyright ©2020 <a href="https://www.templatemonster.com/vendors/AlaaAhmed/"
                                target="_blank">Alaa Ahmed</a>.
                            All
                            Rights Reserved.</span>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="fast-links">
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Start Preloader -->
<div id="loading-mask">
    <div class="loader-wrapper">
        <div class="loader">
            <div class="roller"></div>
            <div class="roller"></div>
        </div>

        <div id="loader2" class="loader">
            <div class="roller"></div>
            <div class="roller"></div>
        </div>

        <div id="loader3" class="loader">
            <div class="roller"></div>
            <div class="roller"></div>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Back To Top-->
<div id="scroll-top"><i class='bx bxs-chevron-up'></i></div>
<!-- End Back To Top-->

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

@if (App::getLocale() == 'ar')
<script src="{{ asset('assets/js/core_rtl.js') }}"></script>
@endif

@livewireScripts()
</body>

</html>
