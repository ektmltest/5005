@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => false,
    ])

    <livewire:auth.forget-password-form :token='$token' />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
