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
                                        <th>{{ __('dashboard_trans.ACTION') }}</th>
                                    </tr>
                                </thead>

                                @foreach($departments as $key => $deparment)
                                <tbody>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $deparment->nameLocale('ar') }}</td>
                                        <td>{{ $deparment->nameLocale('en') }}</td>
                                        <td>{{ $deparment->icon }}</i></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-id="{{ $deparment->id }}" data-bs-toggle="modal"
                                                data-bs-target="#edit_deparment{{ $deparment->id }}"><i
                                                    class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete_deparment{{$deparment->id}}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- edit -->
                                <div class="modal fade" id="edit_deparment{{ $deparment->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{
                                                    __('dashboard_trans.Edit Section') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form wire:submit.prevent="editDeparment({{$deparment->id}})">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">{{
                                                            __('dashboard_trans.Name Ar') }}</label>
                                                        <input type="text" class="form-control" name="name_ar" value={{
                                                            $deparment->nameLocale('ar') }} id="recipient-name">
                                                        @error('ename_ar') <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Name En') }}</label>
                                                        <input type="text" class="form-control" name="name_en" value={{
                                                            $deparment->nameLocale('en') }} id="recipient-name">
                                                        @error('ename_en') <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Icon') }}</label>
                                                        <input type="text" class="form-control" name="icon" value={{
                                                            $deparment->icon }} id="recipient-name">
                                                        @error('eicon') <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button type="submit" class="btn btn-primary">{{
                                                            __('dashboard_trans.Edit') }}</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <!-- delete -->
                                <div class="modal fade" id="delete_deparment{{ $deparment->id }}" tabindex="-1"
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
                                                <form wire:submit.prevent="deleteDeparment({{$deparment->id}})">
                                                    <div class="mb-3 text-center">
                                                        <input type="text" class="form-control hidden" value={{
                                                            $deparment->id }} id="recipient-name">
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
                            </table>
                        </div>
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('dashboard_trans.Add Section') }}</h4>

                            <form wire:submit.prevent="addDeparment">
                                <div>
                                    @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                </div>
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
</div> <!-- container-fluid -->
