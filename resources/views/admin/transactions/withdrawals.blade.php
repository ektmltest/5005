@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Withdraws') }}
@endsection


@section('content')

<livewire:admin.withdrawals />

@endsection
