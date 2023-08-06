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
                                        <th>{{ __('dashboard_trans.AMOUNT TO CHARGE') }}</th>
                                        <th>{{ __('dashboard_trans.IMAGE') }}</th>
                                        <th>{{ __('dashboard_trans.BANK CARD DATA') }}</th>
                                        <th>{{ __('dashboard_trans.ACTION') }}</th>
                                    </tr>
                                </thead>

                                @foreach ($payments as $payment)
                                <tbody>
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ \Str::limit($payment->user->full_name, 20, '...') }}
                                            ({{$payment->user->id}})</td>
                                        <td><span
                                                class="badge bg-{{$payment->state == 'pending' ? 'warning' : ($payment->state == 'accepted' ? 'success' : 'danger')}}">{{
                                                __("dashboard_trans.$payment->state") }}</span></td>
                                        <td>{{ $payment->invoice_amount }} {{__('home_trans.SAR')}}</td>

                                        <td>
                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.IMAGE')}}">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show_image{{$payment->id}}">{{__('dashboard_trans.IMAGE')}}</button>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.BANK CARD DATA')}}">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show_bank_card{{$payment->id}}"><i class="fa fa-eye"></i></button>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($payment->state != 'pending')

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.revert')}}">
                                                <button type="button" class="btn btn-warning btn-sm" onclick="topbar.show()" wire:click='revert({{$payment->id}})'><i
                                                        class="fa fa-undo"></i></button>
                                            </div>

                                            @else

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.accept')}}">
                                                <button id="acceptBtn{{$payment->id}}" type="button" class="btn btn-success btn-sm"><i
                                                        class="fa fa-check"></i></button>
                                            </div>

                                            <div class="d-inline-block mytooltip" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.reject')}}">
                                                <button id="rejectBtn{{$payment->id}}" type="button"
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
                                </tbody>

                                <!-- SHOW -->
                                <div class="modal fade" id="show_image{{ $payment->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-center">
                                        <div class="modal-content">
                                            <div class="modal-header p-2">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{__('dashboard_trans.SHOW') . ' ' . __('dashboard_trans.IMAGE')}}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="img-fluid">
                                                    <img src="{{$payment->invoice_image}}" class="rounded" width="95%"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SHOW -->
                                <div class="modal fade" id="show_bank_card{{ $payment->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header p-2">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{__('dashboard_trans.BANK CARD DATA')}}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.BANK NAME IN ARABIC') }}</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->bankNameLocale('ar')}}</div>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.BANK NAME IN ENGLISH') }}</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->bankNameLocale('en')}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.BANK CARD OWNER NAME IN ARABIC') }}</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->bankCardOwnerLocale('ar')}}</div>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.BANK CARD OWNER NAME IN ENGLISH') }}</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->bankCardOwnerLocale('en')}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">IBAN</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->iban}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.ACCOUNT NUMBER') }}</label>
                                                        <div class="pt-3 pb-3">{{$payment->bankCard->account_number}}</div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer p-0">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                                                        __('dashboard_trans.Cancel')
                                                        }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                <tfoot>
                                    <tr><td colspan="7">{{$payments->links()}}</td></tr>
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
                ids = e.detail.pending_payment_ids;
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
                ids = {{json_encode($payments->where('state', 'pending')->pluck('id'))}};
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
