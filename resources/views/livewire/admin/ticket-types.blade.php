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
                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-id="{{ $ticket_type->id }}" data-bs-toggle="modal"
                                                data-bs-target="#edit_ticket_type{{ $ticket_type->id }}"><i
                                                    class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete_ticket_type{{$ticket_type->id}}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <livewire:admin.ticket-type-edit :ticket_type="$ticket_type">


                                    <!-- delete -->
                                    <div class="modal fade" id="delete_ticket_type{{ $ticket_type->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{
                                                        __('dashboard_trans.Delete Section') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form wire:submit.prevent="deleteTicketType({{$ticket_type->id}})">
                                                        <div class="mb-3 text-center">
                                                            <input type="text" class="form-control hidden" value={{
                                                                $ticket_type->id }} id="recipient-name">
                                                            <h4 class="text-danger">{{ __('dashboard_trans.QuesDele') }}
                                                            </h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button type="submit" class="btn btn-danger">{{
                                                                __('dashboard_trans.Delete') }}</button>
                                                        </div>
                                                    </form>
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
                                            <input type="text" class="form-control" wire:model="name_ar">
                                            @error("name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ICON') }}</label>
                                            <input type="text" class="form-control" wire:model="icon">
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="name_en">
                                            @error("name_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">.</label>
                                            <button type="submit" class="btn btn-success form-control">{{
                                                __('dashboard_trans.Add Section') }}</button>
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
            })
        </script>
    @endif
</div> <!-- container-fluid -->
