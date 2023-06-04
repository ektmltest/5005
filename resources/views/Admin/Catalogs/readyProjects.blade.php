@extends('Admin.layouts.app')
@section('title')
    {{ __('dashboard_trans.Catalog') }} - {{ __('dashboard_trans.Projects management') }}
@endsection


@section('content')

<div class="row">
    <div class="col-xl-12">
    <div class="card checkout-order-summary">
        <div class="table-responsive mb-2">
            <table class="table table-centered table-nowrap mb-0 text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('dashboard_trans.NAME') }}</th>
                        <th>{{ __('dashboard_trans.DESCRIPTION') }}</th>
                        <th>{{ __('dashboard_trans.COST') }}</th>
                        <th>{{ __('dashboard_trans.CATEGORY') }}</th>
                        <th>{{ __('dashboard_trans.TAX') }}</th>
                        <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                    </tr>
                </thead>

                @foreach($ready_projects as $key => $project)
                    <tbody>
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $project->nameLocale('ar') }}</td>
                            <td>{{ $project->nameLocale('en') }}</td>
                            <td>{{ $project->icon }}</i></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-id="{{ $project->id }}"
                                    data-bs-toggle="modal" data-bs-target="#edit_deparment{{ $project->id }}"><i class="fa fa-edit"></i></button>

                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#delete_deparment{{$project->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>

    <!-- edit -->
    <div class="modal fade" id="edit_deparment{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.Edit Section') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="editDeparment({{$project->id}})">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">{{ __('dashboard_trans.Name Ar') }}</label>
                            <input type="text" class="form-control" name="name_ar" value={{ $project->nameLocale('ar') }} id="recipient-name">
                            @error('ename_ar') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">{{ __('dashboard_trans.Name En') }}</label>
                            <input type="text" class="form-control" name="name_en" value={{ $project->nameLocale('en') }} id="recipient-name">
                            @error('ename_en') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">{{ __('dashboard_trans.Icon') }}</label>
                            <input type="text" class="form-control" name="icon" value={{ $project->icon }} id="recipient-name">
                            @error('eicon') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('dashboard_trans.Edit') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- delete -->
    <div class="modal fade" id="delete_deparment{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.Delete Section') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="deleteDeparment({{$project->id}})">
                        <div class="mb-3 text-center">
                            <input type="text" class="form-control hidden" value={{ $project->id }} id="recipient-name">
                            <h4 class="text-danger">{{ __('dashboard_trans.QuesDele') }}</h4>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('dashboard_trans.Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</table>
</div>
</div>
</div>
</div>
@endsection
