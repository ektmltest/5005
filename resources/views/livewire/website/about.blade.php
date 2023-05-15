@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')
    @component('layouts.components.links')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('headers.about.header')),
        'header_body' => ucwords(__('headers.about.body')),
    ])

    <!-- Start Inner Page Content -->
    <div class="my-page-content">
        <!-- Start Random Post -->
        <section id="random-post" class="random-post">
            <div class="container">
                <div class="main-title">
                    <h3>{{ ucwords(__('about_trans.header')) }}</h3>
                </div>
                <div class="first-post">
                    <div class="row row-aligns">
                        <div class="col-md-6">
                            <div class="post-img">
                                <img class="img-fluid" src="{{ asset('assets/img/market_lunch.svg') }}" alt="Hotan Template">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-txt">
                                <span class="dots">
                                    <i class="dot dot1"></i>
                                    <i class="dot dot2"></i>
                                    <i class="dot dot3"></i>
                                </span>
                                <h4 class="co-purple">{{ __('about_trans.paragraph_header1') }}</h4>
                                <p>{{ __('about_trans.paragraph_body1') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second-post">
                    <div class="row row-aligns">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="post-txt">
                                <h4 class="co-purple">{{ __('about_trans.paragraph_header2') }}</h4>
                                <p>{{ __('about_trans.paragraph_body2') }}</p>
                                <span class="dots">
                                    <i class="dot dot1"></i>
                                    <i class="dot dot2"></i>
                                    <i class="dot dot3"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 order-md-2">
                            <div class="post-img">
                                <img class="img-fluid" src="{{ asset('assets/img/problem_solving2.svg') }}"
                                    alt="Hotan Template">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Random Post -->
        <!-- End Inner Page Content -->

        <section id="trial" class="trial">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 grid-margin grid-margin-xl-0 stretch-card">
                        <h4>{{ ucwords(__('about_trans.vision')) }}</h4>
                        <span>{{ __('about_trans.vision_body') }}</span>
                        <div class="line-sepa"></div>
                    </div>
                    <div class="col-md-6 stretch-card">
                        <h4>{{ ucwords(__('about_trans.our_message')) }}</h4>
                        <span>{{ __('about_trans.our_message_body') }}</span>
                        <div class="line-sepa"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="trial" class="trial">
            <div class="container">
                <h4>{{ ucwords(__('about_trans.our_goal_for')) . ' ' . now()->year }}</h4>
                <p class="text-dark">{{ __('about_trans.our_goal_body') }}</p>
                <div class="line-sepa"></div>
                <div class="row mt-5 mb-5">
                    <div class="col-md-4">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="bx bx-wrench"></i>
                            </div>
                            <span class="counter-value">18</span>
                            <h3>{{ ucwords(__('about_trans.working_on')) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter active">
                            <div class="counter-icon">
                                <i class="bx bxs-star-half"></i>
                            </div>
                            <span class="counter-value">50</span>
                            <h3>{{ ucwords(__('about_trans.our_goal')) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter">
                            <div class="counter-icon">
                                <i class="bx bx-check-double"></i>
                            </div>
                            <span class="counter-value">36</span>
                            <h3>{{ ucwords(__('about_trans.completed')) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- team section --}}
    {{-- <section id="our-team" class="our-team mb-5">
        <div class="container">
            <div class="main-title">
                <h3>Meet our team</h3>
                <p>Very talented people</p>
            </div>
            <div class="row d-flex justify-content-center order-0">
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar"
                                    src="https://www.ektml.com/static/img/Ahmed.Shrahelii.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="#"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> Founder</a>
                                <a href="https://twitter.com/m_ahmedshr" class="twitter-view"><i
                                        class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">Ahmed Shraheli</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center order-1">
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar"
                                    src="https://www.ektml.com/static/img/Adham.Almoqdad.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="https://www.instagram.com/Adhamalmoqdad"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> COO</a>
                                <a href="https://www.twitter.com/Adhamalmoqdad" class="twitter-view"><i
                                        class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">Adham Al Moqdad</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar"
                                    src="https://www.ektml.com/static/img/Abdulrahman.Alsubaiq.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="https://www.instagram.com/abdulrahmansbq"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> CDO</a>
                                <a href="https://twitter.com/abdulrahmansbq" class="twitter-view"><i
                                        class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">Abdulrahman Ahmed</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center order-2">
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar"
                                    src="https://www.ektml.com/static/img/abdulrahman.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="https://www.instagram.com/dv0.7/"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> SE </a>
                                <a href="#" class="twitter-view"><i class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">Abdulrahman Al-Ghamdi</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar" src="https://www.ektml.com/static/img/shahid.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="#"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> Server Manager</a>
                                <a href="#" class="twitter-view"><i class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">Shahid Malla</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="member-team">
                        <div class="member-image">
                            <div class="image">
                                <img class="pic-1" alt="Staff avatar" src="https://www.ektml.com/static/img/Hemo.jpg">
                            </div>
                            <div class="member-button-group">
                                <a class="facebook-view" href="https://instagram.com/alhumamofficial"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#" class="read-more"> Design department manager</a>
                                <a href="" class="twitter-view"><i class="bx bxl-twitter"></i></a>
                            </div>
                        </div>
                        <div class="member-content">
                            <h3 class="title">AlHumam AlGhuriez</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- team section --}}
    <!-- Start Question -->
    <section id="question" class="question">
        <div class="container">
            <div class="row row-aligns">
                <div class="col-lg-8">
                    <div class="question-txt">
                        <h3><span>663</span> {{__('about_trans.question_section')}}</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="question-action">
                        <a class="bttn btn-purple" href="#">
                            {{__('main_trans.Get Started')}}
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Question -->
    </div>
@endsection
