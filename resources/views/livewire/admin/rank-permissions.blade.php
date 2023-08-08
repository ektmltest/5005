<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ __('dashboard_trans.Roles management') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Edit permissions') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2" wire:ignore>
                                <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $rank->permissions()->count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.NO. PERMISSIONS') }}</p>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->


            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <h4 class="card-title mb-4 col-6">{!! __('dashboard_trans.edit permissions of', ['name'
                                    => $rank->name, 'id' => $rank->id]) !!}</h4>
                                <div class="col-6" dir="{{app()->getLocale() == 'ar' ? 'ltr' : 'rtl'}}">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#add_permissions">{{__('dashboard_trans.ACTIVATE ALL PERMISSIONS')}}</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete_permissions">{{__('dashboard_trans.DEACTIVATE ALL PERMISSIONS')}}</button>
                                </div>
                            </div>

                            <div class="row justify-content-between mt-3 mb-3">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="{{__('dashboard_trans.Search')}}" wire:keydown='searchFilter' wire:model='search'>
                                </div>
                                <div class="col-6" dir="{{app()->getLocale() == 'ar' ? 'ltr' : 'rtl'}}">
                                    <select wire:change='selectFilter' wire:model='select' class="h-100">
                                        <option value="none">-- {{__('dashboard_trans.TYPE')}} --</option>
                                        <option value="activated">{{__('dashboard_trans.activated')}}</option>
                                        <option value="deactivated">{{__('dashboard_trans.deactivated')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard_trans.NAME') }}</th>
                                            <th>{{ __('dashboard_trans.STATUS') }}</th>
                                            <th class="text-center">{{ __('dashboard_trans.ACTIONS') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td><a href="javascript: void(0);"
                                                    class="text-body fw-bold">{{$permission->id}}</a></td>
                                            <td>{{$permission->name}}</td>
                                            <td>
                                                @if ($rank->hasPermission($permission->key))
                                                <span
                                                    class="badge bg-soft-success">{{__('dashboard_trans.activated')}}</span>
                                                @else
                                                <span
                                                    class="badge bg-soft-danger">{{__('dashboard_trans.deactivated')}}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($rank->hasPermission($permission->key))
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete_permission{{ $permission->id }}">{{__('dashboard_trans.block')}}</button>
                                                @else
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#add_permission{{ $permission->id }}">{{__('dashboard_trans.activate')}}</button>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- delete -->
                                        <div class="modal fade" id="delete_permission{{ $permission->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel{{ $permission->id }}" aria-hidden="true"
                                            wire:ignore.self data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $permission->id }}">{{
                                                            __('dashboard_trans.Delete') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3 text-center">
                                                            <h4 class="text-danger">{{
                                                                __('dashboard_trans.QuesBlock') }}
                                                            </h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-danger" data-bs-dismiss="modal"
                                                                wire:click='deletePermission({{$permission->id}})'>{{
                                                                __('dashboard_trans.block') }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete -->
                                        <div class="modal fade" id="add_permission{{ $permission->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel{{ $permission->id }}" aria-hidden="true" wire:ignore.self
                                            data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $permission->id }}">{{
                                                            __('dashboard_trans.Delete') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3 text-center">
                                                            <h4 class="text-success">{{
                                                                __('dashboard_trans.QuesActivate') }}
                                                            </h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-success" data-bs-dismiss="modal"
                                                                wire:click='addPermission({{$permission->id}})'>{{
                                                                __('dashboard_trans.activate') }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr><td colspan="4">{{$permissions->links()}}</td></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->


    <!-- delete all permissions -->
    <div class="modal fade" id="delete_permissions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{
                        __('dashboard_trans.Delete') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h4 class="text-danger">{{
                            __('dashboard_trans.QuesBlock') }}
                        </h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                            __('dashboard_trans.Cancel')
                            }}</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" wire:click='deleteAllPermissions'>{{
                            __('dashboard_trans.block') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- add all permissions -->
    <div class="modal fade" id="add_permissions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{
                        __('dashboard_trans.ADD') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h4 class="text-success">{{
                            __('dashboard_trans.QuesActivate') }}
                        </h4>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                            __('dashboard_trans.Cancel')
                            }}</button>
                        <button class="btn btn-success" data-bs-dismiss="modal" wire:click='addAllPermissions'>{{
                            __('dashboard_trans.activate') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('custom-scripts')
    <script>

        closeAllModals = () => {
            $('.modal').each((index, elem) => {
                $(elem).modal('hide');
            })
        }

        window.addEventListener('activateMode', (e) => {
            $('#activate_user'+e.detail.id).modal('show');
        })

        window.addEventListener('blockMode', (e) => {
            $('#block_user'+e.detail.id).modal('show');
        })

        window.addEventListener('messageSent', (e) => {
            Swal.fire({
                icon: 'success',
                title: '{{app()->getLocale() == "en" ? "Done" : "تم"}}',
                text: e.detail.message,
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                    closeAllModals();
                }
            })
        });

        window.addEventListener('my:loading', (e) => {
            topbar.show();
        })

        window.addEventListener('my:loaded', (e) => {
            topbar.hide();
        })

    </script>
    @endpush
</div>
