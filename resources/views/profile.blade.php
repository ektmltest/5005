@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.profile')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => True,
        'header_head' => ucwords(__('headers.profile.header')),
        'header_body' => ucwords(__('headers.profile.body')),
    ])

    <livewire:website.profile />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
