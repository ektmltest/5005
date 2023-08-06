<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.Charges') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Charges') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card checkout-order-summary">

                        <div class="table-responsive mb-2">
                            <table class="table table-centered table-nowrap mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('dashboard_trans.MEMBER') }}</th>
                                        <th>{{ __('dashboard_trans.STATUS') }}</th>
                                        <th>{{ __('dashboard_trans.AMOUNT TO WITHDRAWAL') }}</th>
                                        <th>{{ __('dashboard_trans.BANK NAME') }} <i class="fa fa-copy"></i></th>
                                        <th>IBAN <i class="fa fa-copy"></i></th>
                                        <th>{{ __('dashboard_trans.ACTION') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{ $withdrawal->id }}</td>
                                        <td>{{ \Str::limit($withdrawal->user->full_name, 20, '...') }}
                                            ({{$withdrawal->user->id}})</td>
                                        <td><span
                                                class="badge bg-{{$withdrawal->state == 'pending' ? 'warning' : ($withdrawal->state == 'accepted' ? 'success' : 'danger')}}">{{
                                                __("dashboard_trans.$withdrawal->state") }}</span></td>
                                        <td>{{ $withdrawal->invoice_amount }}</td>

                                        <td class="copy-clipboard">{{ $withdrawal->userBankCard->bank_name }}</td>
                                        <td class="copy-clipboard">{{ \Str::limit($withdrawal->userBankCard->iban, 20, '...') }} <span class="d-none">{{$withdrawal->userBankCard->iban}}</span></td>

                                        <td>
                                            @if ($withdrawal->state != 'pending')

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.revert')}}">
                                                <button type="button" class="btn btn-warning btn-sm" onclick="topbar.show()" wire:click='revert({{$withdrawal->id}})'><i
                                                        class="fa fa-undo"></i></button>
                                            </div>

                                            @else

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.accept')}}">
                                                <button id="acceptBtn{{$withdrawal->id}}" type="button" class="btn btn-success btn-sm"><i
                                                        class="fa fa-check"></i></button>
                                            </div>

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.reject')}}">
                                                <button id="rejectBtn{{$withdrawal->id}}" type="button"
                                                    class="btn btn-danger btn-sm align-middle font-weight-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.25em"
                                                        viewBox="0 0 384 512">
                                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <style>
                                                            svg {
                                                                fill: #ffffff
                                                            }
                                                        </style>
                                                        <path
                                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                    </svg>
                                                </button>
                                            </div>

                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                                <tfoot>
                                    <tr><td colspan="7">{{$withdrawals->links()}}</td></tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- end row -->

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

    @if (session()->has('error'))
    <script>
        Swal.fire({
                icon: 'error',
                title: '{{app()->getLocale() == "en" ? "Error" : "خطأ"}}',
                text: "{{ session('error') }}",
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
            // ? fired when arrival of every response comes from livewire component
            window.addEventListener('swal:load', (e) => {
                ids = e.detail.pending_withdrawal_ids;
                console.log(ids);
                ids.forEach(id => {
                    $('#acceptBtn' + id).click(() => {
                        Swal.fire({
                            title: "{{ucwords(__('messages.are you sure?'))}}",
                            text: "{{ucwords(__('messages.you won\'t be able to revert this!'))}}",
                            icon: 'question',
                            showCancelButton: true,
                            cancelButtonText: "{{ucwords(__('dashboard_trans.Cancel'))}}",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )

                                topbar.show();
                                window.livewire.emit('accept', id);
                            }
                        });
                    });

                    $('#rejectBtn' + id).click(() => {
                        Swal.fire({
                            title: "{{ucwords(__('messages.are you sure?'))}}",
                            text: "{{ucwords(__('messages.you won\'t be able to revert this!'))}}",
                            icon: 'question',
                            showCancelButton: true,
                            cancelButtonText: "{{ucwords(__('dashboard_trans.Cancel'))}}",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )

                                topbar.show();
                                window.livewire.emit('reject', id);
                            }
                        });
                    });
                });

                $('.mytooltip').tooltip();
            })

            // ? first load of the page load the events
            window.addEventListener('load', (e) => {
                ids = {{json_encode($withdrawals->where('state', 'pending')->pluck('id'))}};
                console.log(ids);
                ids.forEach(id => {
                    $('#acceptBtn' + id).click(() => {
                        Swal.fire({
                            title: "{{ucwords(__('messages.are you sure?'))}}",
                            text: "{{ucwords(__('messages.you won\'t be able to revert this!'))}}",
                            icon: 'question',
                            showCancelButton: true,
                            cancelButtonText: "{{ucwords(__('dashboard_trans.Cancel'))}}",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )

                                topbar.show();
                                window.livewire.emit('accept', id);
                            }
                        });
                    });

                    $('#rejectBtn' + id).click(() => {
                        Swal.fire({
                            title: "{{ucwords(__('messages.are you sure?'))}}",
                            text: "{{ucwords(__('messages.you won\'t be able to revert this!'))}}",
                            icon: 'question',
                            showCancelButton: true,
                            cancelButtonText: "{{ucwords(__('dashboard_trans.Cancel'))}}",
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Swal.fire(
                                //     'Deleted!',
                                //     'Your file has been deleted.',
                                //     'success'
                                // )

                                topbar.show();
                                window.livewire.emit('reject', id);
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
</div> <!-- container-fluid -->
