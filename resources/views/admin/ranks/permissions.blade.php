@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.TICKET SYSTEM') }}
@endsection


@section('content')

<livewire:admin.rank-permissions :id="$id" />

@endsection
