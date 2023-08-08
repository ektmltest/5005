@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Projects management') }}
@endsection


@section('content')

<livewire:admin.project-sections />

@endsection

