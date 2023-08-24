@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Tickets Management') }}
@endsection


@section('content')

{{session()->put('loaded', config('globals.max_replies'))}}
<livewire:admin.purchase-show :id="$id" />

@endsection
