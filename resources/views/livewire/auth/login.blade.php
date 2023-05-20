@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
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

@endsection
