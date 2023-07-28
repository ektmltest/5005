@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.store')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => True,
        'header_head' => ucwords(__('headers.store.header')),
        'header_body' => ucwords(__('headers.store.body')),
    ])

    {{session()->put('loaded', config('globals.store_pagination'))}}
    <livewire:website.store />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
