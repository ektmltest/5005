@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . __('pages.gallary'))

@section('content')
@component('layouts.components.rtl-links-css')
@endcomponent

@include('layouts.header', [
    'header' => True,
    'header_head' => ucwords(__('headers.gallary.header')),
    'header_body' => __('headers.gallary.body'),
])


<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled">
                <li class="active" data-filter="*">{{ __('main_trans.All') }}</li>
                <li data-filter=".webdesign">{{ __('main_trans.Websites Development') }}</li>
                <li data-filter=".photography">{{ __('main_trans.Apps') }}</li>
                <li data-filter=".graphics">{{ __('main_trans.UI/UX') }}</li>
                <li data-filter=".logo">{{ __('main_trans.Plugins') }}</li>
            </ul>
        </div>

        <div id="portfolio-grid" class="row no-gutter">
            <!-- Start Item -->
            <div class="item photography col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary1') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary1') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item graphics col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary2.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary2.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item webdesign col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary3.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary3.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item photography col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary4.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary4.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item logo col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary5.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary5.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary6') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary6') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item webdesign col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary7.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary7.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item logo col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary8.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary8.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary9.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary9.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item graphics col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary10.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary10.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary11') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary11') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary12.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary12.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary13.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary13.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary14.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary14.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary15') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary15') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary16') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary16') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

        </div>
    </div>
</section>
<!-- End Portfolio -->
<!-- End Inner Page Content -->
<!-- Start Question -->
<section id="question" class="question">
    <div class="container">
        <div class="row row-aligns">
            <div class="col-lg-8">
                <div class="question-txt">
                    <h3><span>693</span> {{ __('main_trans.User has used') }} <br> {{ __('main_trans.Our services successfullly.') }}</h3>
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
@component('layouts.components.rtl-links-js')
@endcomponent
@endsection

