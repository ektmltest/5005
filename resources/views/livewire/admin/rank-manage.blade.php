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
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\Rank::count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.NO. RANKS') }}</p>
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
                                <h4 class="card-title mb-4 col-6">{{ __('dashboard_trans.LAST 10 PROJECTS') }}</h4>
                                <div class="col-6" dir="ltr">
                                    <select name="" id="" wire:change='filterAction' wire:model='filter'>
                                        <option value="none">
                                            -- {{__('dashboard_trans.TYPE')}} --
                                        </option>
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}">
                                            {{$type->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0" id="dataTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard_trans.ARABIC NAME') }}</th>
                                            <th>{{ __('dashboard_trans.ENGLISH NAME') }}</th>
                                            <th>{{ __('dashboard_trans.PRIORITY') }}</th>
                                            <th>{{ __('dashboard_trans.TYPE') }}</th>
                                            <th>{{ __('dashboard_trans.NO. PERMISSIONS') }}</th>
                                            <th>{{ __('dashboard_trans.NO. MEMBERS') }}</th>
                                            <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($ranks as $rank)
                                        <tr>
                                            <td><a href="javascript: void(0);"
                                                    class="text-body fw-bold">{{$rank->id}}</a></td>
                                            <td>{{$rank->nameLocale('ar')}}</td>
                                            <td>{{$rank->nameLocale('en')}}</td>
                                            <td>{{$rank->priority}}</td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill bg-soft-{{$rank->type->color}} font-size-12">{{$rank->type->name}}</span>
                                            </td>
                                            <td>{{$rank->permissions()->count()}}</td>
                                            <td>{{$rank->users()->count()}}</td>
                                            <td>
                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{__('dashboard_trans.PERMISSIONS')}}"
                                                    style="display: inline-block; padding: 0;">
                                                    <a href="{{route('ranks.permissions', $rank->id)}}" type="button" class="btn btn-info btn-sm"><i
                                                            class="fa fa-lock"></i></a>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{__('dashboard_trans.EDIT')}}"
                                                    style="display: inline-block; padding: 0;">
                                                    <a href="{{route('ranks.edit', $rank->id)}}" type="button" class="btn btn-primary btn-sm"><i
                                                            class="fa fa-edit"></i></a>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{__('dashboard_trans.DELETE')}}"
                                                    style="display: inline-block; padding: 0;">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_rank{{ $rank->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- delete -->
                                        <div class="modal fade" id="delete_rank{{ $rank->id }}"
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
                                                                __('dashboard_trans.QuesDele') }}
                                                            </h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-danger"
                                                                wire:click='deleteRank({{$rank->id}})'>{{
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
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{__('dashboard_trans.ADD')}}</h4>

                            <form wire:submit.prevent="addRank">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('dashboard_trans.ARABIC NAME')}}</label>
                                            <input type="text" class="form-control" wire:model="data.name_ar">
                                            @error("data.name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('dashboard_trans.ENGLISH NAME')}}</label>
                                            <input type="text" class="form-control" wire:model="data.name_en">
                                            @error("data.name_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('dashboard_trans.PRIORITY')}}</label>
                                            <input type="number" class="form-control" wire:model="data.priority">
                                            @error("data.priority") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('dashboard_trans.TYPE')}}</label>
                                            <select wire:model='data.type' class="form-control">
                                                <option value="none">-- {{__('dashboard_trans.TYPE')}} --</option>
                                                @foreach ($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @error("data.type") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{strtoupper(__('dashboard_trans.Key'))}}</label>
                                            <input type="number" class="form-control" wire:model="data.key">
                                            @error("data.key") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 mb-3 mt-3 mt-lg-0">
                                        <button type="submit"
                                            class="btn btn-success form-control">{{__('dashboard_trans.ADD')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
            })
    </script>
    @endif

    @push('custom-scripts')
    <script>
        window.addEventListener('activateMode', (e) => {
            $('#activate_user'+e.detail.id).modal('show');
        })

        window.addEventListener('blockMode', (e) => {
            $('#block_user'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div>
