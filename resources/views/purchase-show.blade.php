@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.ticket')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
    'header' => true,
    'header_head' => ucwords(__('headers.ticket.show.header')),
    'header_body' => '',
    'links' => [ucwords(__('pages.ticket')) => route('tickets')]
    ])

    <livewire:website.purchase-show :id="$id" />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
