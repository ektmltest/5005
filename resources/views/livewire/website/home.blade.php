<div id="my-page-content">
    <div class="container">
        <div class="head-content">
            <div class="row row-aligns">
                <div class="col-md-6 order-2 order-md-1">
                    <div class="head-txt">
                        <h2 class="h1">{{ __("main_trans.title1") }} <span class="co-purple">{{ __("main_trans.title2")
                                }}</span></h2>
                        <p>{{ __("main_trans.title3") }}</p>
                        <div class="head-buttons">
                            <a class="bttn btn-purple" data-turbo="false" href="{{ URL('letsStart') }}">
                                {{ __('main_trans.Get Started') }}
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                            <a class="bttn btn-empty" href="https://www.youtube.com/watch?v=afj3WB44lko" data-lity>{{
                                __('main_trans.Watch Video') }} <i class='bx bx-right-arrow'></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 order-1 order-md-2">
                    <div class="head-img">
                        <img class="img-fluid" src="{{ asset('assets/img/saudi-arabia.svg') }}" alt="Hotan Template">
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

    <!-- Start Services -->
    <section id="services" class="services mt-5">
        <div class="container">
            <div class="services-box">
                <div class="section-title">
                    <span>{{ __('home_trans.RELIABLE AND EFFICIENT DELIVERY SERVICES') }}</span>
                    <h3>{{ __('home_trans.All in one place') }} <br> {{ __('home_trans.powered by technology') }}</h3>
                </div>
                <div class="services-inner">
                    <div class="row row-aligns">
                        <div class="col-lg-4 col-md-12">
                            <div class="side-service left">

                                <div class="service-item">
                                    <div class="plus-icon" style="bottom: 30%;">
                                        <i class='bx bx-code-block'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5>{{ __('home_trans.MT1') }}</h5>
                                        <p>{{ __('home_trans.DT1') }}</p>
                                    </div>
                                </div>

                                <div class="service-item">
                                    <div class="plus-icon">
                                        <i class='bx bx-donate-heart'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5>{{ __('home_trans.MT2') }}</h5>
                                        <p>{{ __('home_trans.DT2') }}</p>
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
                                    <div class="service-txt">
                                        <h5>{{ __('home_trans.MT3') }}</h5>
                                        <p>{{ __('home_trans.DT3') }}</p>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="plus-icon">
                                        <i class='bx bx-help-circle'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5>{{ __('home_trans.MT4') }}</h5>
                                        <p>{{ __('home_trans.DT4') }}</p>
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

    <!-- Start Catalog -->
    <section id="portfolio" class="portfolio p-0 m-0">
        <div class="container">
            <div class="trial">
                <div class="container">
                    <h4 style="color:#4b3da7">{{ __('home_trans.projramming Projects') }}</h4>
                </div>
            </div>
            &nbsp;

            <livewire:website.like :max="$max" />


            &nbsp;
            <div class="container" style="text-align: center;">
                <a class="bttn btn-purple" href="{{ route('store') }}">{{ __('home_trans.more Details') }}
                    <i class='bx bx-left-arrow-alt'></i></a>
            </div>
        </div>

    </section>
    <!-- End Catalog -->


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
                            <span class="label label-purple">{{ __('home_trans.The bright feature') }}</span>
                            <h4 class="co-purple">{{ __('home_trans.brightlg') }}</h4>
                            <p>{{ __('home_trans.brightsm') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="second-post">
                <div class="row row-aligns">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="post-txt">
                            <span class="top-ico co-purple"><i class='bx bx-like'></i></span>
                            <span class="label label-purple">{{ __('home_trans.The bright feature') }}</span>
                            <h4 class="co-purple">{{ __('home_trans.brightlg2') }}</h4>
                            <p>{{ __('home_trans.brightsm2') }}</p>
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

    <section id="trial" class="trial">
        <div class="container">
            <h4>{{ __('home_trans.goal') }}</h4>
            <p>{{ __('home_trans.goalDes') }}</p>
            <div class="line-sepa"></div>
            <div class="row mt-5 mb-5">
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="bx bx-wrench"></i>
                        </div>
                        <span class="counter-value">18</span>
                        <h3>{{ __('home_trans.shap1') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter active">
                        <div class="counter-icon">
                            <i class="bx bxs-star-half"></i>
                        </div>
                        <span class="counter-value">50</span>
                        <h3>{{ __('home_trans.shap2') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="bx bx-check-double"></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\ReadyProject::count() }}</span>
                        <h3>{{ __('home_trans.shap3') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <span class="counter-value">{{ \App\Models\User::count() }}</span>
                            <h3>{{ __('home_trans.shap4') }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter active">
                            <div class="counter-icon">
                                <i class='bx bx-briefcase-alt'></i>
                            </div>
                            <span class="counter-value">{{ \App\Models\Project::count() }}</span>
                            <h3>{{ __('home_trans.shap5') }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class='bx bx-like'></i>
                            </div>
                            <span class="counter-value">45215</span>
                            <h3>{{ __('home_trans.shap6') }}</h3>
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
            <h4>{{ __('home_trans.headt') }}</h4>
            <p>{{ __('home_trans.headb') }}</p>
            <div class="line-sepa"></div>
            <h3><span>693</span> {{ __('home_trans.headdes') }}</h3>
            @if (auth()->check())
            <a class="bttn btn-purple" href="{{ route('myProfile') }}">
                {{ __('home_trans.button') }}
                <i class='bx bx-right-arrow-alt'></i>
            </a>
            @else
            <a class="bttn btn-purple" href="{{ route('login') }}">
                {{ __('home_trans.button2') }}
                <i class='bx bx-right-arrow-alt'></i>
            </a>
            @endif
            <img class="img-fluid" src="{{ asset('assets/img/undraw_landscape_mode_53ej.svg') }}" alt="Hotan Template">
        </div>
    </section>
    <!-- End Try Our Trial -->

    <!-- Start Working -->
    <section id="start-working pt-5" class="start-working">
        <div class="overlay"></div>
        <div class="container">
            <div class="row row-aligns">
                <div class="col-lg-7">
                    <div class="video-place">
                        <a href="https://www.youtube.com/watch?v=4RynX087iBA" data-lity>
                            <i class='bx bx-right-arrow'></i>
                        </a>
                        <img width="640" height="360" class="img-fluid lazyload"
                            src="https://www.ektml.com/static/img/home/global.svg" loading="lazy" alt="Ektml Platform">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="video-txt">
                        <span>{{ __('home_trans.Why_Us') }}</span>
                        <h3>{{ __('home_trans.headtitle') }}</h3>
                        <p>{{ __('home_trans.headdes2') }}</p>
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-md-6">
                                    <li><i class='bx bx-bulb'></i> {{ __('home_trans.title1')}}</li>
                                    <li><i class='bx bx-vector'></i> {{ __('home_trans.title2')}}</li>
                                    <li class="active"><i class='bx bx-rocket'></i> {{ __('home_trans.title3')}}</li>
                                </div>
                                <div class="col-md-6">
                                    <li><i class='bx bx-check-double'></i> {{ __('home_trans.title4')}}</li>
                                    <li><i class='bx bx-collection'></i> {{ __('home_trans.title5')}}</li>
                                    <li><i class='bx bx-support'></i> {{ __('home_trans.title6')}}</li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Working -->


    <section id="clients" class="clients">
        <div class="container">
            <h5>{{ __('home_trans.clientH')}}</h5>
            <div class="">
                <div class="row">
                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo1.png') }}" alt="فور بت avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo2.png') }}" alt="رقوم avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo3.png') }}" alt="مؤسسة إمام الدعوة avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo4.png') }}" alt="PayTaps avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo5.png') }}" alt="Discord Partner avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo6.png') }}" alt="للـون avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo7.png') }}" alt="ولي مول avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo8.png') }}" alt="للمليون avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>

                    {{-- <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo9.png') }}" alt="منصة نقرات avatar" loading="lazy" class="grey-animate
                    lazyload" width="100" height="56">
                    </div> --}}

                    <div class="col mt-2">
                        <img src="{{ asset('assets/img/logo9.png') }}" alt="مجلة واك avatar" loading="lazy"
                            class="grey-animate lazyload" width="100" height="56">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--
    <!-- Start Testimonials -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title">
                <span>{{ __('home_trans.OPINIONS') }}</span>
                <h3>{{ __('home_trans.248K+ happy clients') }}</h3>
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
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>

                    <div class="txt-item">
                        <p>الصراحه قدمت لي منصة إكتمل أفضل الأعمال لشركتي وساهمت في تطويرها (رسالة تجريبية)</p>
                        <div class="person-details">
                            <div class="img-person">
                                <img width="640" height="360" class="img-fluid lazyload"
                                    data-src="https://www.ektml.com/avatar/user/8" loading="lazy"
                                    alt="User profile avatar">
                            </div>
                            <div class="txt-person">
                                <h6>فارس الهرف</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Testimonials --> --}}

    {{--
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
    <!-- End Pricing Table --> --}}

    <!-- Start Download App -->
    <section id="download" class="download parallax my-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="txt-phone">
                        <i class='bx bx-cloud-download'></i>
                        <h3>{{ __('home_trans.download')}}</h3>
                        <p>{{ __('home_trans.downloadb') }}</p>
                        <div class="download-bttn">
                            <a href="#" class="play-store">
                                <i class='bx bxl-play-store'></i>
                                <div class="txt-btn">
                                    <span>{{ __('home_trans.Soon On') }}</span>
                                    <span>{{ __('home_trans.Google Play') }}</span>
                                </div>
                            </a>
                            <a href="#" class="apple-store">
                                <i class='bx bxl-apple'></i>
                                <div class="txt-btn">
                                    <span>{{ __('home_trans.Soon On') }}</span>
                                    <span>{{ __('home_trans.Apple Store') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img-phone">
                        <img class="img-fluid lazyload" src="https://www.ektml.com/static/img/our_app.webp"
                            loading="lazy" alt="Ektml mobile application">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Download App -->

    {{--
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
    <!-- End Our Team --> --}}

    <!-- Start Blog -->
    <section id="blog" class="blog mt-5">
        <div class="container">
            <div class="main-title">
                <h3>{{ __('home_trans.Last News') }}</h3>
                <p>{{ __('home_trans.Newsb') }}</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="post-item">
                        <div class="post-img">
                            <img class="img-fluid lazyload" src="https://www.ektml.com/blog/image/31" loading="lazy"
                                alt="إكتمال برمجة موقع مكتبة إمام الدعوة الرقمية Blog image">
                        </div>
                        <div class="post-txt">
                            <a class="post-title" href="https://www.ektml.com/blog/31/imam-library">إكتمال برمجة موقع
                                مكتبة
                                إمام الدعوة الرقمية</a>
                            <ul class="list-unstyled post-details">
                                <li>المهندس احمد شراحيلي</li>
                                <li>16 نوفمبر, 2021 - 7:53 صباحاً</li>
                            </ul>
                            <p>تعلن منصة إكتمل عن إكتمال برمجة مكتبة إمام الدعوة الرقميةوالذي يشرف عليهمعالي الشيخ \ عبد
                                الرحمن السديس إمام وخطيب الحرم المكي وبإذن الله سيتم تدشين الموقع في حفل يرئسةمعالي
                                الشيخ \
                                عبد الرحمن السديسمع حضورالمهندس أحمد شراحيلي ( مؤسس منصة اكتمل )وذلك ...</p>
                            <div class="footer-post">
                                <div class="tags">
                                    <a href="https://www.ektml.com/blog/31/imam-library">{{ __('home_trans.read') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Post Item -->

                <!-- Start Post Item -->
                <div class="col-md-6">
                    <div class="post-item">
                        <div class="post-img">
                            <img class="img-fluid lazyload" src="https://www.ektml.com/blog/image/30" loading="lazy"
                                alt="مود دارك - فور بت Blog image">
                        </div>
                        <div class="post-txt">
                            <a class="post-title" href="https://www.ektml.com/blog/30/forbit-dark">مود دارك - فور بت</a>
                            <ul class="list-unstyled post-details">
                                <li>المهندس احمد شراحيلي</li>
                                <li>09 نوفمبر, 2021 - 12:06 صباحاً</li>
                            </ul>
                            <p>السلام عليكم ورحمة الله وبركاته
                                اليوم وبفضل الله قمنا بإضافة مود الدارك ( المظلم ) في شبكة فور بت التابعة لنا
                                وذلك بعد تلقي العديد من طلبات المستخدمين والزوار
                                ونحن دائما نبذل قصارى جهدنا لتوفير بيئة عمل مناسبة لعملائنا
                                دمتم في أمان الله</p>
                            <div class="footer-post">
                                <div class="tags">
                                    <a href="https://www.ektml.com/blog/30/forbit-dark">{{ __('home_trans.read') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <section id="random-post mt-4" class="random-post my-4">
        <div class="container">
            <div class="main-title">
                <h3>{{ __('home_trans.CEO word') }}</h3>
            </div>
            <div class="first-post">
                <div class="row row-aligns">
                    <div class="col-md-4">
                        <div class="post-img">
                            <img width="640" height="360" class="img-fluid"
                                src="https://www.ektml.com/static/img/home/ceo_image.svg" alt="Ektml Platform">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="post-txt">
                            <span class="dots">
                                <i class="dot dot1"></i>
                                <i class="dot dot2"></i>
                                <i class="dot dot3"></i>
                            </span>
                            <h4 class="co-purple">{{ __('home_trans.Ahmed')}}</h4>
                            <span class="label label-purple mt-3">{{ __('home_trans.ceodes') }}</span>
                            <p class="mt-3">{{ __('home_trans.ceodes2') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Contact Us -->
    <section id="contact-us" class="contact-us">
        <div class="map-area" id="contacts">
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
                            <h3>{{ __('home_trans.Get In Touch') }}</h3>
                            <p>{{ __('home_trans.Please feel free to contact us') }}</p>
                        </div>


                        {{-- contact-us form --}}
                        @component('layouts.components.messages.success')
                        @endcomponent

                        <form wire:submit.prevent='contact'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="text" wire:model="contact.name"
                                                class="floating-label-field floating-label-field--s3" id="field-1"
                                                placeholder="Full Name">
                                            <label for="field-1" class="floating-label">{{
                                                __('home_trans.Name')}}</label>
                                            @error('contact.name')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="text" wire:model="contact.phone"
                                                class="floating-label-field floating-label-field--s3" id="field-4"
                                                placeholder="Phone Number">
                                            <label for="field-4" class="floating-label">{{
                                                __('home_trans.Phone')}}</label>
                                            @error('contact.phone')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="email" wire:model="contact.email"
                                                class="floating-label-field floating-label-field--s3" id="field-2"
                                                placeholder="E-Mail Address">
                                            <label for="field-2" class="floating-label">{{
                                                __('home_trans.Email')}}</label>
                                            @error('contact.email')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <textarea wire:model="contact.message"
                                                class="floating-label-field floating-label-field--s3" id="field-5"
                                                placeholder="Your Message"></textarea>
                                            <label for="field-5" class="floating-label">{{
                                                __('home_trans.Message')}}</label>
                                            @error('contact.message')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-buttons">
                                        <button type="submit" class="btn bttn btn-purple">{{ __('home_trans.Submit')
                                            }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
