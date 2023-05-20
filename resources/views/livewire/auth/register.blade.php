@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.register')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => false,
    ])

<!-- Start Clients -->
<section id="signup" class="signup parallax" style="background: url(white) no-repeat center center fixed;">
<div class="overlay"></div>
<div class="container">
<div class="row row-aligns">
    <div class="col-xl-7 col-lg-5 col-md-5">
        <div class="txt-signup">
            <h2>انظر ما يحدث في العالم الآن</h2>
            <ul class="list-unstyled">
                <li>
                    <i class='bx bx-check-double'></i>
                    ارتقي بمشروعك
                </li>
                <li>
                    <i class='bx bx-check-double'></i>
                    أوصل لأكبر عدد من الناس
                </li>
                <li>
                    <i class='bx bx-check-double'></i>
                    مشاريع تقنية إحترافية
                </li>
            </ul>
        </div>
    </div>

    <div class="col-xl-5 col-lg-7 col-md-7">
        <div class="signup-form">
            <h3>سجل الآن</h3>
            <div id="validerrors" class="alert alert-danger" style="display:none;"></div>
            <form action="signup/register" name="registerForm" data-parsley-errors-container="#validerrors">
                <div class="row">
                    <input type="hidden" name="reCAPTCHA" value="" />
                    <div class="col-xl-6 col-lg-6">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="text" class="floating-label-field floating-label-field--s3" id="field-1" name="firstName" placeholder="الاسم الأول" required data-parsley-required-message="الرجاء التأكد من حقل  الإسم الأول">
                                <label for="field-1" class="floating-label">الاسم الأول</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="text" class="floating-label-field floating-label-field--s3" id="field-2" name="lastName" placeholder="الاسم الأخير" required data-parsley-required-message="الرجاء التأكد من حقل  الإسم الأخير">
                                <label for="field-2" class="floating-label">الاسم الأخير</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>




                    <div class="col-xl-9 col-lg-8 col-8">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="number" class="floating-label-field floating-label-field--s3" id="field-6" pattern="\d*" name="phone"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="501611608" required data-parsley-required-message="الرجاء كتابة رقم الجوال" maxlength="9">
                                <label for="field-2" class="floating-label">رقم الهاتف</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-3 col-4">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                    <select name="country-code" id="inputState" class="form-control floating-label-field--s3" style="
                                        text-align: left;
                                        border-color: #b8bfca;
                                        padding-right: 5px;
                                        padding-left: 8px; ">
                                    <option selected="" value="+966">966+</option>
                                    <option value="+971">971+</option>
                                    <option value="+968">968+</option>
                                    <option value="+965">965+</option>
                                    <option value="+974">974+</option>
                                    <option value="+973">973+</option>
                                    <option value="+970">970+</option>
                                    <option value="+20">20+</option>
                                    <option value="+962">962+</option>
                                            </select>
                                            </div><!-- .floating-label-wrap -->
                                                </div>
                                            </div>



                    <div class="col-xl-12">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="email" class="floating-label-field floating-label-field--s3" id="field-3" name="email" placeholder="البريد الإلكتروني" required data-parsley-required-message="الرجاء التأكد من حقل البريد الإلكتروني" data-parsley-error-message="الرجاء التأكد من حقل البريد الإلكتروني">
                                <label for="field-3" class="floating-label">البريد الإلكتروني</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>
                    
                    <div class="col-xl-12">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="password" class="floating-label-field floating-label-field--s3" id="field-4" name="password" placeholder="كلمة المرور" required data-parsley-minlength="8" data-parsley-required-message="الرجاء التأكد من حقل كلمة المرور">
                                <label for="field-4" class="floating-label">كلمة المرور</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <div class="floating-label-wrap">
                                <input type="password" class="floating-label-field floating-label-field--s3" id="field-5" name="confirmPassword" placeholder="تأكيد كلمة المرور" data-parsley-equalto="#field-4" required data-parsley-required-message="الرجاء التأكد من حقل تأكيد كلمة المرور">
                                <label for="field-5" class="floating-label">تأكيد كلمة المرور</label>
                            </div><!-- .floating-label-wrap -->
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="checkbox-group">
                            <input type="checkbox" id="iAgree" required data-parsley-required-message="من فضلك قم بالموافقة على البنود">
                            <label for="iAgree">قرأت واوافق على<a href="#"> الأحكام والشروط</a></label>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-buttons">
                            <button type="submit" class="btn bttn btn-purple">إنشاء حسابي</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="account-link">
                لديك حساب؟<a href="signin"> تسجيل الدخول</a>
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

@endsection
