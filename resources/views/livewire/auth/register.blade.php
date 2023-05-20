@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')
@component('layouts.components.rtl-links-css')
@endcomponent

@include('layouts.header', [
'header' => false,
])

<section id="signup" class="signup parallax" style="background: url(&quot;white&quot;) 0% 0px no-repeat fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row row-aligns">
            <div class="col-xl-7 col-lg-5 col-md-5">
                <div class="txt-signup">
                    <h2>See what's happening in the world now</h2>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bx bx-check-double"></i>
                            Follow your interests
                        </li>
                        <li>
                            <i class="bx bx-check-double"></i>
                            Reach the largest number of people
                        </li>
                        <li>
                            <i class="bx bx-check-double"></i>
                            Professional technical projects
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-5 col-lg-7 col-md-7">
                <div class="signup-form">
                    @component('livewire.auth.components.register-form')
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
