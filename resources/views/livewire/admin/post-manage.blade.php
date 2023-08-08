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
                                        <th>{{ __('dashboard_trans.TITLE') }}</th>
                                        <th>{{ __('dashboard_trans.SLUG') }} <i class="fa fa-copy"></i></th>
                                        <th>{{ __('dashboard_trans.BY') }}</th>
                                        <th>{{ __('dashboard_trans.CREATED AT') }}</th>
                                        <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($news as $key => $new)

                                    <tr>
                                        <td>{{ $new->id }}</td>
                                        <td>{{ \Str::limit($new->title, 20, '...') }}</td>
                                        <td class="copy-clipboard">{{ \Str::limit($new->slug, 20, '...') }} <span class="d-none">{{$new->slug}}</span></td>
                                        <td>{{ \Str::limit($new->user->full_name, 20, '...') }}</td>
                                        <td>{{ $new->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{route('posts.edit', $new->id)}}" type="button" class="btn btn-primary btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.EDIT')}}"><i
                                                    class="fa fa-edit"></i></a>

                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.DELETE')}}" style="display: inline-block">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#delete_new{{$new->id}}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>

                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('dashboard_trans.SHOW')}}" style="display: inline-block">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show_new{{$new->id}}"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- delete -->
                                    <div class="modal fade" id="delete_new{{ $new->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.DELETE') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form wire:submit.prevent="deleteNew({{$new->id}})">
                                                        <div class="mb-3 text-center">
                                                            <input type="text" class="form-control hidden" value={{
                                                                $new->id }}
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

                                    <!-- SHOW -->
                                    <div class="modal fade p-0" id="show_new{{ $new->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                                        <div class="modal-dialog p-0">
                                            <div class="modal-content card border-0">
                                                <img class="card-img-top" src="{{$new->image}}" alt="Card image cap">

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ARABIC TITLE') }}</label>
                                                            <div class="pt-3 pb-3">{{$new->titleLocale('ar')}}</div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ENGLISH TITLE') }}</label>
                                                            <div class="pt-3 pb-3">{{$new->titleLocale('en')}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.BY') }}</label>
                                                            <div class="pt-3 pb-3">{{$new->user->full_name}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.CREATED AT') }}</label>
                                                            <div class="pt-3 pb-3">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->created_at)->format('D d, M, Y g:i A')}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.UPDATED AT') }}</label>
                                                            <div class="pt-3 pb-3">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->updated_at)->format('D d, M, Y g:i A')}}</div>
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
                                </tbody>

                                <tfoot>
                                    <tr><td colspan="7">{{$news->links()}}</td></tr>
                                </tfoot>
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
