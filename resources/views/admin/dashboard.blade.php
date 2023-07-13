@extends('admin.layouts.app')

@section('title')
{{ __('dashboard_trans.Dashboard') }}
@endsection


@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">{{ __('dashboard_trans.dashboard')}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
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

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\Project::count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.PROJECTS COUNT') }}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\ReadyProject::count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.READY PROJECTS COUNT') }}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\Ticket::count()
                                        }}</span></h4>
                                <p class="text-muted mb-0">{{ __('dashboard_trans.AVAILABLE TICKETS COUNT') }}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->


            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('dashboard_trans.LAST 10 CREATED ACCOUNTS') }}</h4>

                            <div data-simplebar>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-centered">
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td style="width: 20px;"><img src="{{$user->avatar}}"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">{{$user->full_name}}</h6>
                                                </td>
                                                <td><span class="badge bg-soft-{{$user->rank->type->color}} font-size-12">{{$user->rank->type->name}}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- enbd table-responsive-->
                            </div> <!-- data-sidebar-->

                        </div><!-- end card-body-->
                    </div> <!-- end card-->
                </div><!-- end col -->


                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('dashboard_trans.LAST 10 PROJECTS') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('dashboard_trans.PROJECT NAME') }}</th>
                                            <th>{{ __('dashboard_trans.CLIENT') }}</th>
                                            <th>{{ __('dashboard_trans.CATEGORY') }}</th>
                                            <th>{{ __('dashboard_trans.STATUS') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($projects as $project)
                                        <tr>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold">{{$project->id}}</a></td>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->user->full_name}}</td>
                                            <td>{{$project->department->name}}</td>
                                            <td><span
                                                    class="badge rounded-pill bg-soft-{{$project->state->color}} font-size-12">{{$project->state->name}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div> <!-- container-fluid -->
    </div><!-- End Page-content -->
</div>
@endsection
