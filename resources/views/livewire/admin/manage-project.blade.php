<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ __('dashboard_trans.PROJECTS SYSTEM') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Projects management') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-4">
                                <h5 class="font-size-16 mb-0">{{ ucwords(__('dashboard_trans.project states')) }}</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <tbody>
                                        @foreach (\App\Models\ProjectState::all() as $_state)
                                        <tr>
                                            <th class="{{ $_state->id == $state->id ? 'bg-light' : '' }}"
                                                onclick="topbar.show()" style="cursor: pointer;" class="waves-effect"
                                                    wire:click="changeStatus({{$_state->id}})">
                                                <span class="text-{{$_state->color}}">{{$_state->name}}</span>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card checkout-order-summary">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ ucwords(__('dashboard_trans.projects of')) }} {{$state_name}} <i class="bx bxs-briefcase-alt-2"></i></th>
                                    </tr>
                                </thead>
                                @foreach($projects as $project)
                                <tbody>
                                    <tr>
                                        <td><a href="#">{{ $project->name }}</a></td>
                                        <td>{{ $project->created_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

        </div>
    </div>
</div>
