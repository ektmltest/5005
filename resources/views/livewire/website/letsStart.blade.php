@extends('layouts.app')
@section('content')
@component('livewire.website.components.links')
@endcomponent


<header id="inner-header" class="inner-header parallax">
    <div class="overlay"></div>
    <!-- Start Header Content -->
    <div class="container">
        <div class="box-inner">
            <div class="box-content">
                <div class="page-title">
                    <h2 class="h1">{{ __('main_trans.Request a project') }}</h2>
                    <p>{{ __('main_trans.smalltitle')}} </p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
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
<!-- Start Inner Page Content -->
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
                    <img src="img/blob-shape-1.svg" alt="Hotan Template">
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

@endsection
