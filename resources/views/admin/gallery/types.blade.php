@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Our work sections') }}
@endsection


@section('content')

<livewire:admin.gallery-project-types />

@endsection
