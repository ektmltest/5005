@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.faq')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('headers.faq.header')),
        'header_body' => __('headers.faq.body'),
    ])

    <livewire:website.faq />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
