@extends('layouts.app')

@section('title', ucwords(__('pages.home')))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
        'header' => False,
    ])

    @if (Session::has('error'))
        <div id="alert" class="w-100" style="position: absolute; z-index: 99999; text-align: center; top: 65px">
            <div class="alert alert-danger m-auto w-50">
                {{Session::get('error')}}
            </div>
        </div>

        <script>
            setTimeout(() => {
                var alert = document.getElementById('alert');
                alert.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <livewire:website.home />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
