@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.AFFILIATE SYSTEM') }}
@endsection


@section('content')

<livewire:admin.affiliate-user-manage />

@endsection
