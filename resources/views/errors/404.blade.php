{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}

@extends('admin.layouts.app')

@section('title')
    404
@endsection


@section('content')

<div class="my-5 pt-sm-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="error-img">
                                    <img src="{{ asset('dashboard/assets/images/404-error.png') }}" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-uppercase mt-4">{{__('errors.Sorry, page not found')}}</h4>
                    <p class="text-muted">{{__('errors.It will be as simple as Occidental in fact, it will be Occidental')}}</p>
                    <div class="mt-5">
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.home') }}">{{__('errors.Back to Dashboard')}}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

