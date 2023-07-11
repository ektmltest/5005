@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.TICKET SYSTEM') }}
@endsection


@section('content')

<livewire:admin.ticket-type />

@endsection
