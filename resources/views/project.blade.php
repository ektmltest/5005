@extends('layouts.projectParts')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' .  __(\App\Models\ReadyProject::find(request('id'))->name))

@section('content')

@component('layouts.components.rtl-links-css')
@endcomponent

    <header id="inner-header" class="inner-header parallax">
        <div class="overlay"></div>

            {{-- @include('layouts.nav') --}}

            <div class="container">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="page-title">
                            <h2 class="h1">{{ \App\Models\ReadyProject::find(request('id'))->name }}</h2>
                            <p>{{ \App\Models\ReadyProject::find(request('id'))->description }}</p>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://www.ektml.com/">{{ __('main_trans.Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('pages.store') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

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


    {{-- <livewire:website.project /> --}}
    <livewire:website.project :id="$id" />

    @component('layouts.components.rtl-links-js')
    @endcomponent

@endsection
