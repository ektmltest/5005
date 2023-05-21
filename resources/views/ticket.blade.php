@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.ticket')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
    'header' => true,
    'header_head' => ucwords(__('headers.ticket.header')),
    'header_body' => __('headers.ticket.body'),
    ])

    <livewire:website.ticket />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
