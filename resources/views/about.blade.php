@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.about')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('headers.about.header')),
        'header_body' => __('headers.about.body'),
    ])

    <livewire:website.about />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
