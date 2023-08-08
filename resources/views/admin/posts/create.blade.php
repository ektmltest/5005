@extends('admin.layouts.app')
@section('title')
{{ __('dashboard_trans.POSTS SYSTEM') }} - {{ __('dashboard_trans.Posts List') }}
@endsection


@section('content')

<livewire:admin.post-create>

@endsection
