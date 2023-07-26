@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.news')))

@section('content')


    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('headers.news.header')),
        'header_body' => null,
    ])

    <livewire:website.newspaper :slug="$slug" />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
