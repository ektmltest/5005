@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.letsStart')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => True,
        'header_head' => ucwords(__('headers.lesstart.header')),
        'header_body' => __('headers.lesstart.body'),
    ])

    <livewire:website.lets-start />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
