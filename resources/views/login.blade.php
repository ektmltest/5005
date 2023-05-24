@extends('layouts.app', ['auth' => true])

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.login')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => false,
    ])

    @if (Session::has('done'))
        <div id="alert" class="w-100" style="position: absolute; z-index: 99999; text-align: center; top: 65px">
            <div class="alert alert-success m-auto w-50">
                {{Session::get('done')}}
            </div>
        </div>

        <script>
            setTimeout(() => {
                var alert = document.getElementById('alert');
                alert.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <livewire:auth.login wire:init="loadComponent"/>

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
