@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.lets_start')))

@section('content')
@section('title', ucwords(__('main_trans.app_name')) . ' - ' . __('pages.letsStart'))

@component('layouts.components.links')
@endcomponent

@include('layouts.header', [
    'header' => True,
    'header_head' => ucwords(__('headers.lesstart.header')),
    'header_body' => ucwords(__('headers.lesstart.body')),
])

<section id="pricing-table" class="pricing-table">
    <div class="container">
        <div class="section-pricing">
            <h3>{{ __('request_project_trans.bodyTitle')}}</h3>
            <p>{{ __('request_project_trans.bodysTitle')}}</p>
        </div>
        <div class="row">
            <!-- Start Price Item -->
            <div class="col-md-4">
                <div class="price-item">
                    <div class="table-ico">
                        <i class='bx bx-code-alt'></i>
                    </div>
                    <h4>{{ __('request_project_trans.Programming Section') }}</h4>
                    <div class="price-value">
                        <span>{{ __('request_project_trans.des1') }}</span>
                    </div>
                    <div class="price-details">
                        <ul class="list-unstyled">
                            <li class="co-green"><i class="bx bx-laptop"></i>{{ __('request_project_trans.Websites Programming')}}</li>
                            <li class="co-green"><i class="bx bx-mobile-alt"></i>{{ __('request_project_trans.Mobile Apps Programming') }}</li>
                            <li class="co-green"><i class="bx bx-edit"></i>{{ __('request_project_trans.Software modification') }}</li>
                        </ul>
                    </div>
                    <div class="price-btn">
                        <a class="bttn btn-purple" href="#">
                            {{ __('request_project_trans.Choose the section') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Price Item -->



            <!-- Start Price Item -->
            <div class="col-md-4">
                <div class="price-item">
                    <div class="table-ico">
                        <i class='bx bx-diamond'></i>
                    </div>
                    <h4>{{ __('request_project_trans.Graphic Design Section') }}</h4>
                    <div class="price-value">
                        <span>{{ __('request_project_trans.des2') }}</span>
                    </div>
                    <div class="price-details">
                        <ul class="list-unstyled">
                            <li class="co-green"><i class="bx bx-photo-album"></i>{{ __('request_project_trans.Infographic images') }}</li>
                            <li class="co-green"><i class="bx bx-slider-alt"></i>{{ __('request_project_trans.UI UX Designer') }}</li>
                            <li class="co-green"><i class="bx bx-badge-check"></i>{{ __('request_project_trans.Logos and brands') }}</li>
                        </ul>
                    </div>
                    <div class="price-btn">
                        <a class="bttn btn-purple" href="#">
                            {{ __('request_project_trans.Choose the section') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Price Item -->

            <!-- Start Price Item -->
            <div class="col-md-4">
                <div class="price-item active">
                    <img src="img/blob-shape-1.svg" alt="Hotan Template">
                    <div class="table-ico">
                        <i class='bx bx-briefcase'></i>
                    </div>
                    <h4>{{ __('request_project_trans.Project management') }}</h4>
                    <div class="price-value">
                        <span>{{ __('request_project_trans.des3') }}</span>
                    </div>
                    <div class="price-details">
                        <ul class="list-unstyled">
                            <li class="co-green"><i class="bx bx-support"></i>{{ __('request_project_trans.Technical support for the project') }}</li>
                            <li class="co-green"><i class="bx bx-refresh"></i>{{ __('request_project_trans.Maintenance and updates') }}</li>
                            <li class="co-green"><i class="bx bx-highlight"></i>{{ __('request_project_trans.Feasibility study') }}</li>
                        </ul>
                    </div>
                    <div class="price-btn">
                        <a class="bttn btn-purple" href="#">
                            {{ __('request_project_trans.Choose the section') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Price Item -->

        </div>
    </div>
</section>


<!-- Start Question -->
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

@endsection
