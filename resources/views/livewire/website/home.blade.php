@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . __('pages.home'))

@section('content')
    @component('livewire.website.components.links')
    @endcomponent
    <div id="my-page-content">
        <!-- Start Header Content -->
        <div class="head-content">
            <div class="container">
                <div class="row row-aligns">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="head-txt">
                            <h2 class="h1">{{ __("main_trans.title1") }} <span class="co-purple">{{ __("main_trans.title2") }}</span></h2>
                            <p>{{ __("main_trans.title3") }}</p>
                            <div class="head-buttons">
                                <a class="bttn btn-purple" href="#">
                                    Get Started
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                                <a class="bttn btn-empty" href="https://www.youtube.com/watch?v=afj3WB44lko" data-lity>{{ __('main_trans.Watch Video') }} <i class='bx bx-right-arrow'></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="head-img">
                            <img class="img-fluid" src="{{ asset('assets/img/chicago.svg') }}" alt="Hotan Template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Content -->
        <!-- Background Shape-->
        <div class="background-shapes">
            <div class="box1"></div>
            <div class="box2"></div>
            <div class="box3"></div>
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="heart1"><i class='bx bx-message-square'></i></div>
            <div class="heart2"><i class='bx bx-heart'></i></div>
            <div class="circle2"></div>
        </div>
        </header>
        <!-- End Header -->
        <!-- Start Clients -->
        <section id="clients" class="clients">
            <div class="container">
                <h5>Over 2,000 teams manage their content operations with Hotan</h5>
                <div class="clients-logos">
                    <div class="row">
                        <div class="col">
                            <img src="http://placehold.it/150x51" alt="Hotan Template">
                        </div>
                        <div class="col">
                            <img src="http://placehold.it/150x51" alt="Hotan Template">
                        </div>
                        <div class="col">
                            <img src="http://placehold.it/150x51" alt="Hotan Template">
                        </div>
                        <div class="col">
                            <img src="http://placehold.it/150x51" alt="Hotan Template">
                        </div>
                        <div class="col">
                            <img src="http://placehold.it/150x51" alt="Hotan Template">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients -->
        <!-- Start Services -->
        <section id="services" class="services">
            <div class="container">
                <div class="services-box">
                    <div class="section-title">
                        <span>Reliable, efficient delivery</span>
                        <h3>All in one place <br> powered by technology</h3>
                    </div>
                    <div class="services-inner">
                        <div class="row row-aligns">
                            <div class="col-lg-4 col-md-12">
                                <div class="side-service left">
                                    <div class="service-item">
                                        <div class="plus-icon">
                                            <i class='bx bx-code-block'></i>
                                        </div>
                                        <div class="service-txt">
                                            <h5>Website Builds</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Corporis pariatur.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-item">
                                        <div class="plus-icon">
                                            <i class='bx bx-donate-heart'></i>
                                        </div>
                                        <div class="service-txt">
                                            <h5>Marketing Content</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Corporis pariatur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-none d-lg-block">
                                <div class="service-box center">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="side-service right">
                                    <div class="service-item">
                                        <div class="plus-icon">
                                            <i class='bx bx-pencil'></i>
                                        </div>
                                        <div class="service-txt active">
                                            <h5>Articles & Editorial Content</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Corporis pariatur.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-item">
                                        <div class="plus-icon">
                                            <i class='bx bx-help-circle'></i>
                                        </div>
                                        <div class="service-txt">
                                            <h5>Help Side</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Corporis pariatur.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services -->
        <!-- Start Random Post -->
        <section id="random-post" class="random-post">
            <div class="container">
                <div class="first-post">
                    <div class="row row-aligns">
                        <div class="col-md-6">
                            <div class="post-img">
                                <img class="img-fluid" src="{{ asset('assets/img/undraw_mobile_development_8gyo.svg') }}"
                                    alt="Hotan Template">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-txt">
                                <span class="top-ico co-purple"><i class='bx bx-transfer-alt'></i></span>
                                <span class="dots">
                                    <i class="dot dot1"></i>
                                    <i class="dot dot2"></i>
                                    <i class="dot dot3"></i>
                                </span>
                                <span class="label label-purple">The bright feature</span>
                                <h4 class="co-purple">Be unique with multiple hotan pages</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque praesentium harum
                                    iure eos, Quas sequi repudiandae nostrum saepe excepturi maiores modi.</p>
                                <a href="#">
                                    Learn More
                                    <i class='bx bx-right-arrow-alt btn_icon btn_icon_1'></i>
                                    <i class='bx bx-right-arrow-alt btn_icon btn_icon_2'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second-post">
                    <div class="row row-aligns">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="post-txt">
                                <span class="top-ico co-purple"><i class='bx bx-like'></i></span>
                                <span class="label label-purple">The bright feature</span>
                                <h4 class="co-purple">Be unique with multiple hotan pages</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque praesentium harum
                                    iure eos, Quas sequi repudiandae nostrum saepe excepturi maiores modi.</p>
                                <a href="#">
                                    Learn More
                                    <i class='bx bx-right-arrow-alt btn_icon btn_icon_1'></i>
                                    <i class='bx bx-right-arrow-alt btn_icon btn_icon_2'></i>
                                </a>
                                <span class="dots">
                                    <i class="dot dot1"></i>
                                    <i class="dot dot2"></i>
                                    <i class="dot dot3"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 order-md-2">
                            <div class="post-img">
                                <img class="img-fluid" src="{{ asset('assets/img/undraw_unDraw_1000_gty8.svg') }}"
                                    alt="Hotan Template">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Random Post -->
        <!-- Start Statistics -->
        <section id="statistics" class="statistics">
            <div class="container">
                <div class="statistics-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class='bx bx-group'></i>
                                </div>
                                <span class="counter-value">6142</span>
                                <h3>Users</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="counter active">
                                <div class="counter-icon">
                                    <i class='bx bx-briefcase-alt'></i>
                                </div>
                                <span class="counter-value">1002</span>
                                <h3>Projects</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class='bx bx-like'></i>
                                </div>
                                <span class="counter-value">45215</span>
                                <h3>Subscribers</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Statistics -->
        <!-- Start Try Our Trial -->
        <section id="trial" class="trial">
            <div class="container">
                <h4>Get the brand new <br>
                    Hotan Service today</h4>
                <p>With Hotan you get components and examples, including tons of variables that will help you customize this
                    theme with ease.</p>
                <div class="line-sepa"></div>
                <h3><span>1,693,752</span> User have been using our Services successfully.</h3>
                <a class="bttn btn-purple" href="#">
                    Free 30 Days Trial
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
                <img class="img-fluid" src="{{ asset('assets/img/undraw_landscape_mode_53ej.svg') }}"
                    alt="Hotan Template">
            </div>
        </section>
        <!-- End Try Our Trial -->
        <!-- Start Working -->
        <section id="start-working" class="start-working">
            <div class="overlay"></div>
            <div class="container">
                <div class="row row-aligns">
                    <div class="col-lg-7">
                        <div class="video-place">
                            <a href="https://www.youtube.com/watch?v=afj3WB44lko" data-lity>
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <img class="img-fluid" src="http://placehold.it/1280x800" alt="Hotan Template">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="video-txt">
                            <span>Why Us?</span>
                            <h3>Beautiful Place for your Great Journey</h3>
                            <p>We tried to make very high-quality product and so our code is very neat and clean. Whatever
                                anyone could improve and modify the template to your liking.</p>
                            <ul class="list-unstyled">
                                <div class="row">
                                    <div class="col-md-6">
                                        <li><i class='bx bx-bulb'></i> Modern Design</li>
                                        <li><i class='bx bx-vector'></i> Easy To Customize</li>
                                        <li class="active"><i class='bx bx-rocket'></i> Super Fast Load</li>
                                    </div>
                                    <div class="col-md-6">
                                        <li><i class='bx bx-check-double'></i> Clean & Valid Code</li>
                                        <li><i class='bx bx-collection'></i> Multipurpose Layout</li>
                                        <li><i class='bx bx-support'></i> 24/7 Support</li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Working -->
        <!-- Start Testimonials -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="section-title">
                    <span>testimonials</span>
                    <h3>248K+ happy clients</h3>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme">
                    <!-- Start Item -->
                    <div class="item">
                        <div class="open-st">
                            <i class='bx bx-message-detail'></i>
                        </div>
                        <div class="rate-star">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <div class="txt-item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Atque praesentium harum iure eos.
                                Quas sequi repudiandae nostrum, saepe excepturi maiores, modi.</p>
                            <div class="person-details">
                                <div class="img-person">
                                    <img class="img-fluid" src="http://placehold.it/327x334" alt="Hotan Template">
                                </div>
                                <div class="txt-person">
                                    <h6>Maria C. Blanton</h6>
                                    <span>Business Development Specialist</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                    <!-- Start Item -->
                    <div class="item">
                        <div class="open-st">
                            <i class='bx bx-message-detail'></i>
                        </div>
                        <div class="rate-star">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="txt-item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Atque praesentium harum iure eos.
                                Quas sequi repudiandae nostrum, saepe excepturi maiores, modi.</p>
                            <div class="person-details">
                                <div class="img-person">
                                    <img class="img-fluid" src="http://placehold.it/327x334" alt="Hotan Template">
                                </div>
                                <div class="txt-person">
                                    <h6>Brian K. Schultz</h6>
                                    <span>Product designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                    <!-- Start Item -->
                    <div class="item">
                        <div class="open-st">
                            <i class='bx bx-message-detail'></i>
                        </div>
                        <div class="rate-star">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                        <div class="txt-item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Atque praesentium harum iure eos.
                                Quas sequi repudiandae nostrum, saepe excepturi maiores, modi.</p>
                            <div class="person-details">
                                <div class="img-person">
                                    <img class="img-fluid" src="http://placehold.it/327x334" alt="Hotan Template">
                                </div>
                                <div class="txt-person">
                                    <h6>Robert D. Odegaard</h6>
                                    <span>Flight service specialist</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                    <!-- Start Item -->
                    <div class="item">
                        <div class="open-st">
                            <i class='bx bx-message-detail'></i>
                        </div>
                        <div class="rate-star">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <div class="txt-item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Atque praesentium harum iure eos.
                                Quas sequi repudiandae nostrum, saepe excepturi maiores, modi.</p>
                            <div class="person-details">
                                <div class="img-person">
                                    <img class="img-fluid" src="http://placehold.it/327x334" alt="Hotan Template">
                                </div>
                                <div class="txt-person">
                                    <h6>Olivia J. Yates</h6>
                                    <span>Android Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                    <!-- Start Item -->
                    <div class="item">
                        <div class="open-st">
                            <i class='bx bx-message-detail'></i>
                        </div>
                        <div class="rate-star">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half'></i>
                        </div>
                        <div class="txt-item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Atque praesentium harum iure eos.
                                Quas sequi repudiandae nostrum, saepe excepturi maiores, modi.</p>
                            <div class="person-details">
                                <div class="img-person">
                                    <img class="img-fluid" src="http://placehold.it/327x334" alt="Hotan Template">
                                </div>
                                <div class="txt-person">
                                    <h6>James K. Miller</h6>
                                    <span>Image designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
            </div>
        </section>
        <!-- End Testimonials -->
        <!-- Start Pricing Table -->
        <section id="pricing-table" class="pricing-table">
            <div class="container">
                <div class="section-pricing">
                    <h3>Let's find a way together</h3>
                    <p>Entry Level Plans <br> Pay as you go pricing</p>
                </div>
                <div class="row">
                    <!-- Start Price Item -->
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="table-ico">
                                <i class='bx bx-user'></i>
                            </div>
                            <h4>Start Up</h4>
                            <div class="price-value">
                                <span>forever</span>
                                <h5>Free</h5>
                            </div>
                            <div class="price-details">
                                <ul class="list-unstyled">
                                    <li class="co-green"><i class="bx bx-check"></i>Disk Space</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Email Accounts</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Monthly Bandwidth</li>
                                    <li class="co-red"><i class="bx bx-x"></i>Subdomains</li>
                                    <li class="co-red"><i class="bx bx-x"></i>Domains</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a class="bttn btn-purple" href="#">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Price Item -->
                    <!-- Start Price Item -->
                    <div class="col-md-4">
                        <div class="price-item active">
                            <img src="{{ asset('assets/img/blob-shape-1.svg') }}" alt="Hotan Template">
                            <div class="table-ico">
                                <i class='bx bx-briefcase'></i>
                            </div>
                            <h4>Small Business</h4>
                            <div class="price-value">
                                <span>Starting at</span>
                                <h5>$29/mo</h5>
                            </div>
                            <div class="price-details">
                                <ul class="list-unstyled">
                                    <li class="co-green"><i class="bx bx-check"></i>Disk Space</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Email Accounts</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Monthly Bandwidth</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Subdomains</li>
                                    <li class="co-red"><i class="bx bx-x"></i>Domains</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a class="bttn btn-purple" href="#">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Price Item -->
                    <!-- Start Price Item -->
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="table-ico">
                                <i class='bx bx-rocket'></i>
                            </div>
                            <h4>Enterprise</h4>
                            <div class="price-value">
                                <span>Starting at</span>
                                <h5>$499/mo</h5>
                            </div>
                            <div class="price-details">
                                <ul class="list-unstyled">
                                    <li class="co-green"><i class="bx bx-check"></i>Disk Space</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Email Accounts</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Monthly Bandwidth</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Subdomains</li>
                                    <li class="co-green"><i class="bx bx-check"></i>Domains</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a class="bttn btn-purple" href="#">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Price Item -->
                </div>
            </div>
        </section>
        <!-- End Pricing Table -->
        <!-- Start Download App -->
        <section id="download" class="download parallax">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="txt-phone">
                            <i class='bx bx-cloud-download'></i>
                            <h3>Download our app</h3>
                            <p>We tried to make very high-quality product and so our code is very neat and clean. Whatever
                                anyone could improve and modify the template to your liking.</p>
                            <div class="download-bttn">
                                <a href="#" class="play-store">
                                    <i class='bx bxl-play-store'></i>
                                    <div class="txt-btn">
                                        <span>Get it on</span>
                                        <span>Play Store</span>
                                    </div>
                                </a>
                                <a href="#" class="apple-store">
                                    <i class='bx bxl-apple'></i>
                                    <div class="txt-btn">
                                        <span>Get it on</span>
                                        <span>Apple Store</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="img-phone">
                            <img class="img-fluid" src="http://placehold.it/350x595" alt="Hotan Template">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Download App -->
        <!-- Start Our Team -->
        <section id="our-team" class="our-team">
            <div class="container">
                <div class="main-title">
                    <h3>Meet our team</h3>
                    <p>We have a team <br> highly talented people</p>
                </div>
                <div class="row">
                    <!-- Start Member Team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="member-team">
                            <div class="member-image">
                                <a href="#" class="image">
                                    <img class="pic-1" src="http://placehold.it/255x326">
                                    <img class="pic-2" src="http://placehold.it/255x326">
                                </a>
                                <div class="member-button-group">
                                    <a class="facebook-view" href="#"><i class='bx bxl-facebook'></i></a>
                                    <a href="#" class="read-more"> Front-End Developer</a>
                                    <a href="#" class="twitter-view"><i class='bx bxl-twitter'></i></a>
                                </div>
                            </div>
                            <div class="member-content">
                                <h3 class="title">Gilbert P. Titus</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Member Team -->
                    <!-- Start Member Team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="member-team">
                            <div class="member-image">
                                <a href="#" class="image">
                                    <img class="pic-1" src="http://placehold.it/255x326">
                                    <img class="pic-2" src="http://placehold.it/255x326">
                                </a>
                                <div class="member-button-group">
                                    <a class="facebook-view" href="#"><i class='bx bxl-facebook'></i></a>
                                    <a href="#" class="read-more"> Android Developer</a>
                                    <a href="#" class="twitter-view"><i class='bx bxl-twitter'></i></a>
                                </div>
                            </div>
                            <div class="member-content">
                                <h3 class="title">Jessica G. Lee</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Member Team -->
                    <!-- Start Member Team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="member-team">
                            <div class="member-image">
                                <a href="#" class="image">
                                    <img class="pic-1" src="http://placehold.it/255x326">
                                    <img class="pic-2" src="http://placehold.it/255x326">
                                </a>
                                <div class="member-button-group">
                                    <a class="facebook-view" href="#"><i class='bx bxl-facebook'></i></a>
                                    <a href="#" class="read-more"> IOS Developer</a>
                                    <a href="#" class="twitter-view"><i class='bx bxl-twitter'></i></a>
                                </div>
                            </div>
                            <div class="member-content">
                                <h3 class="title">Jon J. Hess</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Member Team -->
                    <!-- Start Member Team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="member-team">
                            <div class="member-image">
                                <a href="#" class="image">
                                    <img class="pic-1" src="http://placehold.it/255x326">
                                    <img class="pic-2" src="http://placehold.it/255x326">
                                </a>
                                <div class="member-button-group">
                                    <a class="facebook-view" href="#"><i class='bx bxl-facebook'></i></a>
                                    <a href="#" class="read-more"> Marketing Manager</a>
                                    <a href="#" class="twitter-view"><i class='bx bxl-twitter'></i></a>
                                </div>
                            </div>
                            <div class="member-content">
                                <h3 class="title">Christina R. Lemons</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Member Team -->
                </div>
            </div>
        </section>
        <!-- End Our Team -->
        <!-- Start Blog -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="main-title">
                    <h3>Recent News</h3>
                    <p>Here's some thoughts <br> from our blog</p>
                </div>
                <div class="row">
                    <!-- Start Post Item -->
                    <div class="col-md-6">
                        <div class="post-item">
                            <div class="post-img">
                                <img class="img-fluid" src="http://placehold.it/700x450" alt="Hotan Template">
                            </div>
                            <div class="post-txt">
                                <a class="post-title" href="#">Beautiful Place for your Great Journey</a>
                                <ul class="list-unstyled post-details">
                                    <li>John Doe</li>
                                    <li>9 Sep, 2020</li>
                                    <li>326 Comments</li>
                                </ul>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur quam facere accusamus
                                    dolore eos rerum ducimus eveniet vero at laborum quod quasi est odit nobis minima, earum
                                    laudantium, ad quia.</p>
                                <div class="footer-post">
                                    <div class="tags">
                                        <a href="#">Mobile</a>
                                    </div>
                                    <div class="action-post">
                                        <a href="#"><i class='bx bx-bookmark'></i></a>
                                        <a href="#"><i class='bx bx-heart'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Post Item -->
                    <!-- Start Post Item -->
                    <div class="col-md-6">
                        <div class="post-item mb-mob-0">
                            <div class="post-img">
                                <img class="img-fluid" src="http://placehold.it/700x450" alt="Hotan Template">
                            </div>
                            <div class="post-txt">
                                <a class="post-title" href="#">Beautiful Place for your Great Journey</a>
                                <ul class="list-unstyled post-details">
                                    <li>John Doe</li>
                                    <li>9 Sep, 2020</li>
                                    <li>326 Comments</li>
                                </ul>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur quam facere accusamus
                                    dolore eos rerum ducimus eveniet vero at laborum quod quasi est odit nobis minima, earum
                                    laudantium, ad quia.</p>
                                <div class="footer-post">
                                    <div class="tags">
                                        <a href="#">Development</a>
                                    </div>
                                    <div class="action-post">
                                        <a href="#"><i class='bx bx-bookmark'></i></a>
                                        <a href="#"><i class='bx bx-heart'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Post Item -->
                </div>
            </div>
        </section>
        <!-- End Blog -->
        <!-- Start Contact Us -->
        <section id="contact-us" class="contact-us">
            <div class="map-area" id="contacts">
                <div id="googleMap" style="width:100%;"></div>
            </div>
            <div class="form-area">
                <div class="form-inner">
                    <!-- Background Shape-->
                    <div class="background-shapes">
                        <div class="box1"></div>
                        <div class="box2"></div>
                        <div class="box3"></div>
                        <div class="dot1"></div>
                        <div class="dot2"></div>
                        <div class="heart1"><i class='bx bx-message-square'></i></div>
                        <div class="heart2"><i class='bx bx-heart'></i></div>
                        <div class="circle2"></div>
                    </div>
                    <div class="container">
                        <div class="form-box">
                            <div class="main-title">
                                <h3>Get In Touch</h3>
                                <p>Please feel free to contact us <br> if you need any further information</p>
                            </div>
                            <form autocomplete="off" action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <input type="text"
                                                    class="floating-label-field floating-label-field--s3" id="field-1"
                                                    placeholder="Full Name">
                                                <label for="field-1" class="floating-label">Full Name</label>
                                            </div><!-- .floating-label-wrap -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <input type="email"
                                                    class="floating-label-field floating-label-field--s3" id="field-2"
                                                    placeholder="E-Mail Address">
                                                <label for="field-2" class="floating-label">E-Mail Address</label>
                                            </div><!-- .floating-label-wrap -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <input type="text"
                                                    class="floating-label-field floating-label-field--s3" id="field-3"
                                                    placeholder="Subject">
                                                <label for="field-3" class="floating-label">Subject</label>
                                            </div><!-- .floating-label-wrap -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <input type="text"
                                                    class="floating-label-field floating-label-field--s3" id="field-4"
                                                    placeholder="Phone Number">
                                                <label for="field-4" class="floating-label">Phone Number</label>
                                            </div><!-- .floating-label-wrap -->
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <textarea class="floating-label-field floating-label-field--s3" id="field-5" placeholder="Your Message"></textarea>
                                                <label for="field-5" class="floating-label">Your Message</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-buttons">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Us -->
    </div>
@endsection
