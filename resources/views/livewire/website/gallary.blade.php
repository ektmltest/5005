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
                <img class="img-fluid" target="_blank" src="{{ asset('assets/img/gallary1') }}">
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
        <script>const translate = {"added":"You have added","toprojectcategories":"To your project categories","areyousure":"Are you sure?","norevert":"You won't be able to revert this!","yesCloseTheTicket":"Yes, Close the Ticket","cancel":"Cancel","ticketcategory":"Please choose a ticket type","ticketsubject":"Please write the Ticket subject","ticketcontent":"Please write the Ticket content","yesdeletethepost":"Yes, delete","edit":"Edit","rateTheProject":"Select a rate","attachMessageWithRate":"Attach a letter with the rate","writeMessageHere":"Write your message here","sendRate":"Rate","sweetAlertBtnJS":"Okay","dataAlreadySaved":"This data is already saved","name_ar":"Arabic name","name_en":"English name","icon":"Icon","priceStartFrom":"Prices start from"}; const token = $("meta[name=token]").attr("content");</script>    <script> const google_site_key = "6LegyqUaAAAAAP1kX1yUg2_iEi2GoSQObBkp0Vo2";</script>
            <script src="https://www.ektml.com/static/js/core.js"></script>
        <script src="https://www.ektml.com/static/js/portfolio.js"></script>

@component('layouts.components.rtl-links-js')
@endcomponent
@endsection

