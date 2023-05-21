@if($auth == true)
<section id="question" class="question">
    <div class="container">
        <div class="row row-aligns">
            <div class="col-lg-8">
                <div class="question-txt">
                    <h3><span>663</span> {{ __('main_trans.User has used') }} <br> {{ __('main_trans.Our services successfullly.') }}</h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="question-action">
                    <a class="bttn btn-purple" href="#">
                        {{ __('main_trans.Start with us now!') }}
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Question -->
@endif

<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-box">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="theme-details">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="Hotan Template" title="Hotan" style="width: 100px !important">
                        </a>
                        <p>{{ __('main_trans.FooterTitle')}}</p>
                        <ul class="list-unstyled">
                            <li><a href="https://twitter.com/ektml_sa"><i class="bx bxl-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/ektml_sa/"><i class="bx bxl-instagram"></i></a></li>
                            <li><a href="https://t.me/ektml_sa"><i class="bx bxl-telegram"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=+966501611608"><i class="bx bxl-whatsapp"></i></a></li>
                            <li><a href="https://www.facebook.com/ektml"><i class="bx bxl-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="foot-box sitemap">
                        <h4>{{ __('main_trans.Sitemap') }}</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}">{{ __('main_trans.Home') }}</a></li>
                        </ul>

                        <ul class="list-unstyled">
                            <li><a href="{{ route('gallary') }}">{{ __('main_trans.Our work gallery') }}</a></li>
                        </ul>

                        <ul class="list-unstyled">
                            <li><a href="{{ route('faq') }}">{{ __('main_trans.FAQ') }}</a></li>
                        </ul>

                        <ul class="list-unstyled">
                            <li><a href="{{ route('about') }}">{{ __('main_trans.About us') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="foot-box contact-details">
                        <h4>{{ __('main_trans.Contact Us') }}</h4>
                        <ul class="list-unstyled">
                            <li>
                                <i class='bx bx-map'></i>
                                {{ __("main_trans.Rashidiya 1, Al Sharai ', Makkah")}}
                            </li>
                            <li>
                                <i class='bx bx-mail-send'></i>
                                <a href="mailto:info@example.com">support@ektml.com</a>
                            </li>
                            <li>
                                <i class='bx bx-phone'></i>
                                <a href="tel:+447990704483">+966 501611608</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="foot-box newsletter">
                        <h4>{{ __('main_trans.News')}}</h4>
                        <p>{{ __('main_trans.small') }}</p>
                        <form autocomplete="off" action="#">
                            <div class="input-box">
                                <div class="floating-label-wrap">
                                    <input type="email" class="floating-label-field floating-label-field--s3"
                                        id="field-6" placeholder="Subscribe">
                                    <label for="field-6" class="floating-label">{{ __('main_trans.E-Mail Address')}}</label>
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
                        <span>Copyright ©2020 <a href="https://www.ektml.com/" target="_blank">{{ __('main_trans.Ektml')}}</a>.
                            {{ __('main_trans.All Rights Reserved.') }}</span>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="fast-links">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}">{{ __('main_trans.Home') }}</a></li>
                            <li><a href="#">{{ __('main_trans.Terms Of Service') }}</a></li>
                            <li><a href="#">{{ __('main_trans.Privacy policy') }}</a></li>
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

@component('layouts.components.scripts-links')
@endcomponent

@livewireScripts()
