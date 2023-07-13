<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.TICKET SYSTEM') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Tickets Management') }}
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
                                        <th>{{ __('dashboard_trans.ARABIC NAME') }}</th>
                                        <th>{{ __('dashboard_trans.ENGLISH NAME') }}</th>
                                        <th>{{ __('dashboard_trans.BY') }}</th>
                                        <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($types as $ticket_type)

                                    <tr>
                                        <td>{{ $ticket_type->id }}</td>
                                        <td>{{ $ticket_type->nameLocale('ar') }}</td>
                                        <td>{{ $ticket_type->nameLocale('en') }}</td>
                                        <td>{{ $ticket_type->user->full_name }}</i></td>
                                        <td>
                                            {{-- <button type="button" class="btn btn-primary btn-sm"
                                                data-id="{{ $ticket_type->id }}" data-bs-toggle="modal"
                                                data-bs-target="#edit_ticket_type{{ $ticket_type->id }}"><i
                                                    class="fa fa-edit"></i></button> --}}

                                            <button type="button" class="btn btn-primary btn-sm"
                                                wire:click="updateMode({{ $ticket_type->id }})"><i
                                                    class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="deleteMode({{ $ticket_type->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit -->
                                    <div class="modal fade" id="edit_ticket_type{{ $ticket_type->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                        data-bs-backdrop="static">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{
                                                        __('dashboard_trans.Edit') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" wire:click='resetErrorMessages'></button>
                                                </div>

                                                <div class="modal-body">
                                                    @if ($errors->any())
                                                    <div class="alert">
                                                        <ul class="m-0 p-0 text-danger">
                                                            @foreach ($errors->getMessages() as $key => $error)
                                                            @foreach ($error as $err)
                                                            <li>{{$key}}: {{$err}}</li>
                                                            @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">{{
                                                            __('dashboard_trans.Name Ar') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$ticket_type->id}}.name_ar"
                                                            value="{{ $ticket_type->nameLocale('ar') }}"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Name En') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$ticket_type->id}}.name_en"
                                                            value="{{ $ticket_type->nameLocale('en') }}"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary"
                                                            data-bs-dismiss="modal" wire:click='resetErrorMessages'>{{
                                                            __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button class="btn btn-primary"
                                                            wire:click='editTicketType({{$ticket_type->id}})'>{{
                                                            __('dashboard_trans.Edit') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete -->
                                    <div class="modal fade" id="delete_ticket_type{{ $ticket_type->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                        data-bs-backdrop="static">
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
                                                            __('dashboard_trans.QuesDele') }}
                                                        </h4>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary"
                                                            data-bs-dismiss="modal" wire:click='resetErrorMessages'>{{
                                                            __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button class="btn btn-danger"
                                                            wire:click='deleteTicketType({{$ticket_type->id}})'>{{
                                                            __('dashboard_trans.Delete') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $types->links() }}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('dashboard_trans.Add Section') }}</h4>

                            <form wire:submit.prevent="addTicketType">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_ar">
                                            @error("store.name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_en">
                                            @error("store.name_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="w-50 mb-3 mt-3 mt-lg-0">
                                            <button type="submit" class="btn btn-success form-control">{{
                                                __('dashboard_trans.ADD') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    @push('custom-scripts')
    <script>
        window.addEventListener('updateMode', (e) => {
            $('#edit_ticket_type'+e.detail.id).modal('show');
        })

        window.addEventListener('deleteMode', (e) => {
            $('#delete_ticket_type'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div> <!-- container-fluid -->
