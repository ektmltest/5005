@extends('layouts.app')
@section('content')

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
