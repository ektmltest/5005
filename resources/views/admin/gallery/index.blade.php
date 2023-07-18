@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Our work') }}
@endsection


@section('content')

<livewire:admin.gallery-projects />

@endsection
