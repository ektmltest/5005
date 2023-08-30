<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ ucwords(strtolower(__('dashboard_trans.AFFILIATE SYSTEM'))) }}</li>
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
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\User::where('marketing_level_id', 'IS NOT', NULL)->count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.CURRENT MARKETERS') }}</p>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->


            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <div class="col-6">
                                    <input type="text"
                                        class="form-control"
                                        placeholder="{{__('dashboard_trans.Search')}} ({{__('dashboard_trans.FULL NAME') . ', ' . __('dashboard_trans.EMAIL') . ', ' . __('dashboard_trans.PHONE')}})"
                                        wire:keydown='searchAction'
                                        wire:model='search'
                                        onkeydown="topbar.show()">
                                </div>
                                <div class="col-6" dir="ltr">
                                    <select name="" id="" wire:change='filterAction' wire:model='filter'>
                                        <option value="none">
                                            -- {{__('dashboard_trans.STATUS')}} --
                                        </option>
                                        <option value="activated">
                                            {{ __('dashboard_trans.activated') }}
                                        </option>
                                        <option value="pending">
                                            {{ __('dashboard_trans.pending') }}
                                        </option>
                                        <option value="blocked">
                                            {{ __('dashboard_trans.blocked') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0" id="dataTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard_trans.FULL NAME') }}</th>
                                            <th>{{ __('dashboard_trans.EMAIL') }}</th>
                                            <th>{{ __('dashboard_trans.PHONE') }}</th>
                                            <th>{{ __('dashboard_trans.MARKETING LEVEL') }}</th>
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
                                            <td>
                                                @if ($user->marketing_level_id)
                                                    <a href="#">{{__('dashboard_trans.id')}}: {{$user->marketing_level_id}}</a>
                                                @else
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        wire:click="activateMode({{ $user->id }})">{{__('dashboard_trans.set')}}</button>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- delete -->
                                        <div class="modal fade" id="activate_user{{ $user->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                                            wire:ignore.self data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">{{
                                                            strtoupper(__('dashboard_trans.set')) }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <div>
                                                                <label for="">{{__('dashboard_trans.MARKETING LEVEL')}}</label>
                                                                <select wire:model='data.marketing_level_id' class="form-control">
                                                                    <option value="">--</option>
                                                                    @foreach (\App\Models\MarketingLevel::all() as $level)
                                                                        <option value="{{$level->id}}">id: {{$level->id}} | max_transactions: {{$level->max_transactions}} | benefit: {{$level->benefit_ratio}}%</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('data.marketing_level_id')
                                                                    <span class="text-danger">* {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal" wire:click='resetForm'>{{
                                                                __('dashboard_trans.Cancel')
                                                                }}</button>
                                                            <button class="btn btn-success"
                                                                wire:click='activate({{$user->id}})'>{{
                                                                ucwords(__('dashboard_trans.set')) }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr><td colspan="6">{{$users->links()}}</td></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
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
