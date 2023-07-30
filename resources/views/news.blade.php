@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.news')))

@section('content')


    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => true,
        'header_head' => ucwords(__('home_trans.Last News')),
        'header_body' => ucwords(__('home_trans.Newsb')),
    ])

{{session()->put('loaded', config('globals.home_news'))}}
<livewire:website.newspaper-index />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
