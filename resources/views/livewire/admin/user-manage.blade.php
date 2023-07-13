<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ __('dashboard_trans.Users Management') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Users Management') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row" wire:ignore>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.CURRENT CUSTOMERS') }}</p>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->


            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('dashboard_trans.LAST 10 PROJECTS') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard_trans.FULL NAME') }}</th>
                                            <th>{{ __('dashboard_trans.EMAIL') }}</th>
                                            <th>{{ __('dashboard_trans.PHONE') }}</th>
                                            <th>{{ __('dashboard_trans.STATUS') }}</th>
                                            <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td><a href="javascript: void(0);"
                                                    class="text-body fw-bold">{{$user->id}}</a></td>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->country_code . $user->phone}}</td>
                                            <td><span
                                                    class="badge rounded-pill bg-soft-{{$user->state == 'activated' ? 'success' : (($user->state == 'pending') ? 'warning' : 'danger')}} font-size-12">{{$user->state}}</span>
                                            </td>
                                            <td>
                                                @if ($user->state == 'blocked')
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        wire:click="activateMode({{ $user->id }})">{{__('dashboard_trans.activate')}}</button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        wire:click="blockMode({{ $user->id }})">{{__('dashboard_trans.block')}}</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                        @if ($user->state != 'blocked')
                                        <!-- delete -->
                                        <div class="modal fade" id="block_user{{ $user->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                                            wire:ignore.self data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">{{
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
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                                wire:click='resetErrorMessages'>{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-danger"
                                                                wire:click='deleteTicketType({{$user->id}})'>{{
                                                                __('dashboard_trans.Delete') }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @else

                                        <!-- delete -->
                                        <div class="modal fade" id="activate_user{{ $user->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                                            wire:ignore.self data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">{{
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
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                                wire:click='resetErrorMessages'>{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-success"
                                                                wire:click='deleteTicketType({{$user->id}})'>{{
                                                                __('dashboard_trans.Delete') }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div><!-- end row -->
        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->

    @if (session()->has('message'))
    <script>
        Swal.fire({
                icon: 'success',
                title: '{{app()->getLocale() == "en" ? "Done" : "تم"}}',
                text: "{{ session('message') }}",
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                    window.location = window.location.href.split("?")[0];
                }
                // TODO:
                // $('.modal .show').modal('hide');
                // console.log($('.modal .show'));
                // window.livewire.emit('resetAction');
            })
    </script>
    @endif

    @push('custom-scripts')
    <script>
        window.addEventListener('activateMode', (e) => {
            console.log('activate_user'+e.detail.id);
            console.log($('#activate_user'+e.detail.id));
            $('#activate_user'+e.detail.id).modal('show');
        })

        window.addEventListener('blockMode', (e) => {
            $('#block_user'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div>
