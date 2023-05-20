@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
<<<<<<< HEAD
        'header' => true,
        'header_head' => ucwords(__('headers.about.header')),
        'header_body' => __('headers.about.body'),
    ])

<!-- Start Clients -->
<section id="signin" class="signup signin parallax" style="background: url(white) no-repeat center center fixed;">
<div class="overlay"></div>
<div class="container">
    <div class="row row-aligns">
        <div class="col-xl-7 col-md-6">
            <div class="txt-signup">
                <h2>ابدأ مشروعك التقني الآن</h2>
                <ul class="list-unstyled">
                    <li>
                        <i class='bx bx-check-double'></i>
                        ارتقي بمشروعك الآن                            </li>
                    <li>
                        <i class='bx bx-check-double'></i>
                        أوصل لأكبر عدد من الناس                            </li>
                    <li>
                        <i class='bx bx-check-double'></i>
                        مشاريع تقنية إحترافية                            </li>
                </ul>
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="signup-form">
                <h3>تسجيل الدخول</h3>
                <div id="validerrors" class="alert alert-danger" style="display:none;"></div>
                <form action="signin/enter" method="POST" name="signinForm" data-parsley-errors-container="#validerrors">
                    <div class="row">
                        <input type="hidden" name="reCAPTCHA" value="" />
                        <div class="col-xl-12">
                            <div class="form-group">
                                <div class="floating-label-wrap">
                                    <input type="email" autocomplete="on" class="floating-label-field floating-label-field--s3" id="field-1" name="email" placeholder="البريد الإلكتروني" required data-parsley-required-message="الرجاء التأكد من حقل البريد الإلكتروني" data-parsley-error-message="الرجاء التأكد من حقل البريد الإلكتروني">
                                    <label for="field-1" class="floating-label">البريد الإلكتروني</label>
                                </div><!-- .floating-label-wrap -->
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <div class="floating-label-wrap">
                                    <input type="password" class="floating-label-field floating-label-field--s3" id="field-2" name="password" placeholder="كلمة المرور" required data-parsley-minlength="8" data-parsley-required-message="الرجاء التأكد من حقل كلمة المرور">
                                    <label for="field-2" class="floating-label">كلمة المرور</label>
                                </div><!-- .floating-label-wrap -->
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="checkbox-group">
                                <input type="checkbox" id="box-3" name="rememberme" value="">
                                <label for="box-3">تذكرني</label>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-buttons">
                                <a href="forgetPassword">نسيت كلمة المرور؟</a>
                                <button type="submit" class="btn bttn btn-purple">دخول</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="account-link">
                    لا تملك حساب؟ <a href="signup">أنشئ حساب</a>
                </div>
            </div>
        </div>
    </div>
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
</div>
</section>
<!-- Start Footer -->
<footer id="footer" class="footer">
<div class="container">
    <div class="footer-box">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="theme-details">
                    <a href="https://www.ektml.com/">
                        <center><img width="200" height="110" class="lazyload" data-src="https://www.ektml.com/public/static/img/logo_ektml.webp" loading="lazy" alt="منصة إكتمل"></center>
                    </a>
                    <p>منصة إكتمل، حيث ترتقي بمشروعك إلى الإنترنت،
المملكة العربية السعودية - ( رؤية 2030 ) مؤسسة نخبة الشرق للإتصالات وتقنية المعلومات</p>

                    <ul class="list-unstyled">
                    <li><a href="https://www.twitter.com/ektml_sa" target="_blank" rel="noopener"><i class="bx bxl-twitter"></i></a></li><li><a href="http://instagrm.com/ektml_sa" target="_blank" rel="noopener"><i class="bx bxl-instagram"></i></a></li><li><a href="https://t.me/ektml_sa" target="_blank" rel="noopener"><i class="bx bxl-telegram"></i></a></li><li><a href="https://api.whatsapp.com/send?phone=+966501611608" target="_blank" rel="noopener"><i class="bx bxl-whatsapp"></i></a></li><li><a href="https://facebook.com/ektml" target="_blank" rel="noopener"><i class="bx bxl-facebook"></i></a></li>                            </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="foot-box sitemap">
                    <h4>خريطة الموقع</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://www.ektml.com/home">الرئيسة</a></li>
                        <li><a href="https://www.ektml.com/ourwork">معرض أعمالنا</a></li>
                        <li><a href="https://www.ektml.com/faq">الأسئلة الشائعة</a></li>
                        <li><a href="https://www.ektml.com/aboutus">من نحن؟</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="foot-box contact-details">
                    <h4>راسلنا</h4>
                    <ul class="list-unstyled">

                                    <li>
                                        <i class="bx bx-map"></i>
                                        الراشدية 1، الشرائع، مكة المكرمة
                                    </li>
                                    <li>
                                        <i class="bx bx-mail-send"></i>
                                        support@ektml.com
                                    </li>
                                    <li>
                                        <i class="bx bx-phone"></i>
                                        501611608 966+
                                    </li>                            </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="foot-box newsletter">
                    <h4>النشرة الأخبارية</h4>
                    <p>اكتب ايميلك في الأسفل لتشترك معنا لـ تصلك آخر العروض</p>
                    <form autocomplete="off" action="#">
                        <div class="input-box">
                            <div class="floating-label-wrap">
                                <input type="email" class="floating-label-field floating-label-field--s3" id="field-6" placeholder="Subscribe">
                                <label for="field-6" class="floating-label">البريد الإلكتروني</label>
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
                    <span>2023 &copy;<a href="#" target="_blank"> إكتمل</a>.
                        جميع الحقوق محفوظة.</span>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="fast-links">
                    <ul class="list-unstyled">
                        <li><a href="https://www.ektml.com/home">الرئيسة</a></li>
                        <li><a href="https://www.ektml.com/tos">شروط الخدمة</a></li>
                        <li><a href="https://www.ektml.com/privacy">سياسة الخصوصية</a></li>
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
<script src="https://www.ektml.com/static/js/plugins.js"></script>
<!-- Modernizer Script for old Browsers -->
<script src="https://www.ektml.com/static/js/modernizr-2.6.2.min.js"></script>
<script>
let loc = window.location;
loc = loc.href.split('/');
const dataToCheck = ['tickets', 'projects'];
const dontKnow = '';
dataToCheck.forEach(function(thingToCheck){
    if(loc[3] == thingToCheck){
        if(loc[4] && loc[3] !== dataToCheck[0]){
            var thelocx = window.location.pathname;
            dontKnow = window.location.origin + "/" +thelocx.split('/')[1] +"/"+thelocx.split('/')[2] ;
        } else {
        dontKnow = window.location.origin + "/" +window.location.pathname.split('/')[1];
        }
        $("#clientoptions").addClass('co-purple-imp');
        $("#menuItems li [href='"+dontKnow+"']").addClass('co-purple-imp');
        dontKnow = '';
    }
});
$("#menuItems li [href='"+window.location+"']").addClass('co-purple-imp');
if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
    img.src = img.dataset.src;
    });
} else {
    // Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src =
    'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
}
</script>
<!-- Core JS -->
<script>const translate = {"added":"\u0644\u0642\u062f \u0642\u0645\u062a \u0628\u0625\u0636\u0627\u0641\u0629","toprojectcategories":"\u0627\u0644\u0649 \u0641\u0626\u0627\u062a \u0645\u0634\u0627\u0631\u064a\u0639\u0643","areyousure":"\u0647\u0644 \u0623\u0646\u062a \u0645\u062a\u0623\u0643\u062f\u061f","norevert":"\u0644\u0646 \u062a\u062a\u0645\u0643\u0646 \u0645\u0646 \u0627\u0644\u062a\u0631\u0627\u062c\u0639 \u0639\u0646 \u0647\u0630\u0627!","yesCloseTheTicket":"\u0646\u0639\u0645\u060c \u0625\u063a\u0644\u0642 \u0627\u0644\u062a\u0630\u0643\u0631\u0629","cancel":"\u0625\u0644\u063a\u0627\u0621 \u0627\u0644\u0625\u0645\u0631","ticketcategory":"\u0627\u0644\u0631\u062c\u0627\u0621 \u0625\u062e\u062a\u064a\u0627\u0631 \u0646\u0648\u0639 \u0627\u0644\u062a\u0630\u0643\u0631\u0629","ticketsubject":"\u0627\u0644\u0631\u062c\u0627\u0621 \u0643\u062a\u0627\u0628\u0629 \u0639\u0646\u0648\u0627\u0646 \u0627\u0644\u062a\u0630\u0643\u0631\u0629","ticketcontent":"\u0627\u0644\u0631\u062c\u0627\u0621 \u0643\u062a\u0627\u0628\u0629 \u0645\u062d\u062a\u0648\u0649 \u0627\u0644\u062a\u0630\u0643\u0631\u0629","yesdeletethepost":"\u0646\u0639\u0645\u060c \u0623\u062d\u0630\u0641","edit":"\u062a\u0639\u062f\u064a\u0644","rateTheProject":"\u0642\u0645 \u0628\u0625\u062e\u062a\u064a\u0627\u0631 \u062a\u0642\u064a\u064a\u0645","attachMessageWithRate":"\u0625\u0631\u0641\u0642 \u0631\u0633\u0627\u0644\u0629 \u0645\u0639 \u0627\u0644\u062a\u0642\u064a\u064a\u0645","writeMessageHere":"\u0625\u0643\u062a\u0628 \u0631\u0633\u0627\u0644\u062a\u0643 \u0647\u0646\u0627","sendRate":"\u062a\u0642\u064a\u064a\u0645","sweetAlertBtnJS":"\u0645\u0648\u0627\u0641\u0642","dataAlreadySaved":"\u0647\u0630\u0647 \u0627\u0644\u0628\u064a\u0627\u0646\u0627\u062a \u0645\u062d\u0641\u0648\u0638\u0629 \u0645\u0633\u0628\u0642\u0627\u064b","name_ar":"\u0627\u0644\u0625\u0633\u0645 \u0627\u0644\u0639\u0631\u0628\u064a","name_en":"\u0627\u0644\u0625\u0633\u0645 \u0627\u0644\u0625\u0646\u062c\u0644\u064a\u0632\u064a","icon":"\u0627\u0644\u0623\u064a\u0642\u0648\u0646\u0647","priceStartFrom":"\u0627\u0644\u0623\u0633\u0639\u0627\u0631 \u062a\u0628\u062f\u0623 \u0645\u0646"}; const token = $("meta[name=token]").attr("content");</script>    <script> const google_site_key = "6LegyqUaAAAAAP1kX1yUg2_iEi2GoSQObBkp0Vo2";</script>
    <script defer src="https://www.ektml.com/static/js/core_rtl.js"></script>
<script src="https://www.ektml.com/static/vendors/parsley/parsley.min.js"></script><script src="https://www.google.com/recaptcha/api.js?render=6LegyqUaAAAAAP1kX1yUg2_iEi2GoSQObBkp0Vo2"></script><script src="https://www.ektml.com/static/js/pages/signin.js?v=2.1"></script>    </body>

</html>

=======
        'header' => false,
    ])

    <section id="signin" class="signup signin parallax" style="background: url(&quot;white&quot;) 0% 0px no-repeat fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row row-aligns">
                <div class="col-xl-7 col-md-6">
                    <div class="txt-signup">
                        <h2>ابدأ مشروعك التقني الآن</h2>
                        <ul class="list-unstyled">
                            <li>
                                <i class="bx bx-check-double"></i>
                                ارتقي بمشروعك الآن                            </li>
                            <li>
                                <i class="bx bx-check-double"></i>
                                أوصل لأكبر عدد من الناس                            </li>
                            <li>
                                <i class="bx bx-check-double"></i>
                                مشاريع تقنية إحترافية                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="signup-form">
                        @component('livewire.auth.components.login-form')
                        @endcomponent
                    </div>
                </div>
            </div>
            <!-- Background Shape-->
            <div class="background-shapes">
                <div class="box1"></div>
                <div class="box2"></div>
                <div class="box3"></div>
                <div class="dot1"></div>
                <div class="dot2"></div>
                <div class="heart1"><i class="bx bx-message-square"></i></div>
                <div class="heart2"><i class="bx bx-heart"></i></div>
                <div class="circle2"></div>
            </div>
        </div>
    </section>

>>>>>>> kareem
@endsection
