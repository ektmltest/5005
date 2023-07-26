@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . __($project->name))

@section('content')

    @component('layouts.components.rtl-links-css')
    @endcomponent

    @include('layouts.header', [
    'header' => true,
    'header_head' => $project->name,
    'header_body' => $project->description,
    ])

    <livewire:website.project :id="$project->id" />

    @component('layouts.components.rtl-links-js')
    @endcomponent

@endsection
