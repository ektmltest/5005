@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Our platforms') }}
@endsection


@section('content')

<livewire:admin.platforms />

@endsection

