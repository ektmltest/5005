<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.PROJECTS SYSTEM') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Projects sections') }}
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
                                        <th>{{ __('dashboard_trans.ICON') }}</th>
                                        <th>{{ __('dashboard_trans.ICON UNICODE') }}</th>
                                        <th>{{ __('dashboard_trans.ACTION') }}</th>
                                    </tr>
                                </thead>

                                @foreach($departments as $key => $department)
                                <tbody>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $department->nameLocale('ar') }}</td>
                                        <td>{{ $department->nameLocale('en') }}</td>
                                        <td>{{ $department->icon }}</i></td>
                                        <td>{{ $department->unicode }}</i></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                wire:click="updateMode({{ $department->id }})"><i
                                                    class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="deleteMode({{ $department->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- edit -->
                                <div class="modal fade" id="edit_department{{ $department->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                    data-bs-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{
                                                    __('dashboard_trans.Edit Section') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form wire:submit.prevent="editDepartment({{$department->id}})">
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
                                                            wire:model="data.{{$department->id}}.name_ar" id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Name En') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$department->id}}.name_en" id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Icon') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$department->id}}.icon" id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.ICON UNICODE') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$department->id}}.unicode" id="recipient-name">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button onclick="topbar.show()" type="submit" class="btn btn-primary">{{
                                                            __('dashboard_trans.Edit') }}</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <!-- delete -->
                                <div class="modal fade" id="delete_department{{ $department->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                    data-bs-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{
                                                    __('dashboard_trans.Delete Section') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form wire:submit.prevent="deleteDepartment({{$department->id}})">
                                                    <div class="mb-3 text-center">
                                                        <input type="text" class="form-control hidden" value={{
                                                            $department->id }} id="recipient-name">
                                                        <h4 class="text-danger">{{ __('dashboard_trans.QuesDele') }}
                                                        </h4>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button onclick="topbar.show()" type="submit" class="btn btn-danger">{{
                                                            __('dashboard_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                <tfoot>
                                    <tr><td colspan="6">{{$departments->links()}}</td></tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('dashboard_trans.Add Section') }}</h4>

                            <form wire:submit.prevent="addDepartment">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_ar">
                                            @error("store.name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_en">
                                            @error("store.name_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">{{ __('dashboard_trans.ICON') }}</label>
                                            <input type="text" class="form-control" wire:model="store.icon">
                                            @error('store.icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">{{ __('dashboard_trans.ICON UNICODE') }}</label>
                                            <input type="text" class="form-control" wire:model="store.unicode">
                                            @error('store.unicode') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mt-3 col-lg-3">
                                    <label class="form-label">.</label>
                                    <button onclick="topbar.show()" type="submit" class="btn btn-success form-control">{{
                                        __('dashboard_trans.Add Section') }}</button>
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
            $('#edit_department'+e.detail.id).modal('show');
        })

        window.addEventListener('deleteMode', (e) => {
            $('#delete_department'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div> <!-- container-fluid -->
