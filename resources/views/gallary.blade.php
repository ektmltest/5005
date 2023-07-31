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

    {{session()->put('loaded', config('globals.store_pagination'))}}
    <livewire:website.gallary />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
