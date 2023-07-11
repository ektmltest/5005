<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.Catalog') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Projects management') }}
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
                                        <th>{{ __('dashboard_trans.NAME') }}</th>
                                        <th>{{ __('dashboard_trans.DESCRIPTION') }}</th>
                                        <th>{{ __('dashboard_trans.PRICE') }}</th>
                                        <th>{{ __('dashboard_trans.DEPARTMENT') }}</th>
                                        <th>{{ __('dashboard_trans.TAX') }}</th>
                                        <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($ready_projects as $key => $project)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ \Str::limit($project->description, 20, '...') }}</td>
                                        <td>{{ $project->price }}</td>
                                        <td>{{ $project->department->name }}</td>
                                        <td>{{ $project->marketing_discount_ratio }}%</td>
                                        <td>
                                            <a href="{{route('readyProjects.edit', $project->id)}}" type="button" class="btn btn-primary btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.EDIT')}}"><i
                                                    class="fa fa-edit"></i></a>

                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.DELETE')}}" style="display: inline-block">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#delete_deparment{{$project->id}}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>

                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.SHOW')}}" style="display: inline-block">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show_deparment{{$project->id}}"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>

                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.LINK')}}" style="display: inline-block">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#link_deparment{{$project->id}}"><i
                                                        class="fa fa-link"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- delete -->
                                    <div class="modal fade" id="delete_deparment{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.DELETE') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form wire:submit.prevent="deleteDeparment({{$project->id}})">
                                                        <div class="mb-3 text-center">
                                                            <input type="text" class="form-control hidden" value={{
                                                                $project->id }}
                                                            id="recipient-name">
                                                            <h4 class="text-danger">{{ __('dashboard_trans.QuesDele') }}
                                                            </h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{
                                                                __('dashboard_trans.Cancel') }}</button>
                                                            <button type="submit" class="btn btn-danger">{{
                                                                __('dashboard_trans.Delete')
                                                                }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- LINK -->
                                    <div class="modal fade" id="link_deparment{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header p-2">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard_trans.LINK')}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body text-center">
                                                    <a href="{{$project->link}}" target="_blank">{{$project->link}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SHOW -->
                                    <div class="modal fade" id="show_deparment{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog text-center">
                                            <div class="modal-content">
                                                <div class="modal-header p-2">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard_trans.SHOW')}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="img-fluid">
                                                        <img src="{{$project->image}}" class="rounded" width="95%" alt="">
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

        </div>
    </div>

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
</div>
