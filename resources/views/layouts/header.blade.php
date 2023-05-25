<header id="inner-header" class="inner-header parallax">
<div class="overlay"></div>

    @include('layouts.nav')

    @if($header)
        @include('layouts.header-content', [
            'header_title' => $header_head,
            'header_content' => $header_body
        ])
    @endif

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
