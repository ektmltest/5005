@extends('layouts.app', ['auth' => true])

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.register')))

@section('content')
    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => false,
    ])

    <livewire:auth.register />
@endsection
