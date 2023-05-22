@extends('layouts.app')

@section('title', ucwords(__('pages.home')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => False,
    ])

    <livewire:website.home />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
