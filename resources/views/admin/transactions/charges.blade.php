@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Charges') }}
@endsection


@section('content')

<livewire:admin.charges />

@endsection
