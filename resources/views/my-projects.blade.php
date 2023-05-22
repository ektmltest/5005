@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.myprojects')))

@section('content')


    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('headers.myprojects.header')),
        'header_body' => ucwords(__('headers.myprojects.body')),
    ])

    <livewire:website.my-projects />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
