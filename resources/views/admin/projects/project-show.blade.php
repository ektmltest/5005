@extends('admin.layouts.app')

@section('title')
    {{ __('dashboard_trans.Projects management') }}
@endsection


@section('content')

{{session()->put('loaded', config('globals.max_replies'))}}
<livewire:admin.project-show :id="$id" />

@endsection

