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
                {{Session::get('error')}} <span id="alert-counter"></span>
            </div>
        </div>

        <script>
            var i = 5;
            var id = setInterval(() => {
                var counter = document.getElementById('alert-counter');
                counter.innerHTML = --i;
            }, 1000);

            setTimeout(() => {
                var alert = document.getElementById('alert');
                alert.style.display = 'none';
                clearInterval(id);
            }, 5000);
        </script>

        {{-- * this part is working as well --}}
        {{-- @push('custom-scripts')
        <script>
            $.notify("{{Session::get('error')}}")
        </script>
        @endpush --}}
    @endif

    <livewire:website.home />

    @component('layouts.components.rtl-links-js')
    @endcomponent
@endsection
