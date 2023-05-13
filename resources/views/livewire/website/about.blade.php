@extends('layouts.app')

@section('title', ucwords('ektml | about us'))

@section('content')
    <!-- Start Inner Page Content -->
    <div class="">
        <!-- Start Random Post -->
        <section id="random-post" class="random-post">
            <div class="container">
                <div class="first-post">
                    <div class="row row-aligns">
                        <div class="col-md-6">
                            <div class="post-img">
                                <img class="img-fluid" src="img/undraw_mobile_development_8gyo.svg" alt="Hotan Template">
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
                                <img class="img-fluid" src="img/undraw_unDraw_1000_gty8.svg" alt="Hotan Template">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Random Post -->
        <!-- End Inner Page Content -->
        <!-- Start Question -->
        <section id="question" class="question">
            <div class="container">
                <div class="row row-aligns">
                    <div class="col-lg-8">
                        <div class="question-txt">
                            <h3><span>1,693,752</span> User have been using <br> our Services successfully.</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="question-action">
                            <a class="bttn btn-purple" href="#">
                                Free 30 Days Trial
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Question -->
    </div>

    @include('layouts.preloader')
@endsection
