@extends('admin.layouts.app')
@section('title')
{{ __('dashboard_trans.Catalog') }} - {{ __('dashboard_trans.Addons') }}
@endsection


@section('content')

<livewire:admin.addons>

@endsection
