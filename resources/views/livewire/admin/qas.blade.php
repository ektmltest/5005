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
                                        <th>{{ __('dashboard_trans.QUESTION') }}</th>
                                        <th>{{ __('dashboard_trans.ANSWER') }}</th>
                                        <th>{{ __('dashboard_trans.TYPE') }}</th>
                                        {{-- <th>{{ Str::upper(__('dashboard_trans.BY')) }}</th> --}}
                                        <th>{{ __('dashboard_trans.CREATED AT') }}</th>
                                        <th>{{ __('dashboard_trans.ACTIONS') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($qas as $qa)

                                    <tr>
                                        <td>{{ $qa->id }}</td>
                                        <td>{{ Str::limit($qa->question, 20, '...') }}</td>
                                        <td>{{ Str::limit($qa->answer, 20, '...') }}</td>
                                        <td>{{ $qa->type->name }}</td>
                                        <td>{{ $qa->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            {{-- <button type="button" class="btn btn-primary btn-sm"
                                                data-id="{{ $type->id }}" data-bs-toggle="modal"
                                                data-bs-target="#edit_type{{ $type->id }}"><i
                                                    class="fa fa-edit"></i></button> --}}

                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-placement="top" title="{{__('dashboard_trans.SHOW')}}">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#show_qa{{$qa->id}}"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>

                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-placement="top" title="{{__('dashboard_trans.DELETE')}}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="deleteMode({{ $qa->id }})"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- show -->
                                    <div class="modal fade p-0" id="show_qa{{ $qa->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                                        <div class="modal-dialog p-0">
                                            <div class="modal-content card border-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{
                                                        __('dashboard_trans.SHOW') . " QA: $qa->id" }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                {{-- <img class="card-img-top" src="{{$qa->image}}" alt="Card image cap"> --}}

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ARABIC QUESTION') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->questionLocale('ar')}}</div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ENGLISH QUESTION') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->questionLocale('en')}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ARABIC ANSWER') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->answerLocale('ar')}}</div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.ENGLISH ANSWER') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->answerLocale('en')}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{ __('dashboard_trans.Name Ar') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->type->nameLocale('ar')}}</div>
                                                        </div>

                                                        <div class="col-lg-6 mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{ __('dashboard_trans.Name En') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->type->nameLocale('en')}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.BY') }}</label>
                                                            <div class="pt-3 pb-3">{{$qa->user->full_name}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label for="message-text" class="text-primary col-form-label">{{
                                                                __('dashboard_trans.CREATED AT') }}</label>
                                                            <div class="pt-3 pb-3">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $qa->created_at)->format('D d, M, Y g:i A')}}</div>
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

                                    <!-- delete -->
                                    <div class="modal fade" id="delete_qa{{ $qa->id }}" tabindex="-1"
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
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                            wire:click='resetErrorMessages'>{{
                                                            __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button class="btn btn-danger"
                                                            wire:click='deleteQa({{$qa->id}})'>{{
                                                            __('dashboard_trans.Delete') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr><td colspan="6">{{$qas->links()}}</td></tr>
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
                            <h4 class="card-title">{{ __('dashboard_trans.ADD') . ' ' . __('dashboard_trans.QUESTION') }}</h4>

                            <form wire:submit.prevent="addQa">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC QUESTION') }}</label>
                                            <textarea rows="5" class="form-control" wire:model="store.question_ar"></textarea>
                                            @error("store.question_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH QUESTION') }}</label>
                                            <textarea rows="5" class="form-control" wire:model="store.question_en"></textarea>
                                            @error("store.question_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC ANSWER') }}</label>
                                            <textarea rows="5" class="form-control" wire:model="store.answer_ar"></textarea>
                                            @error("store.answer_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH ANSWER') }}</label>
                                            <textarea rows="5" class="form-control" wire:model="store.answer_en"></textarea>
                                            @error("store.answer_en") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.TYPE') }}</label>
                                            <select class="form-control" wire:model='store.type_id'>
                                                <option value="none">-- {{__('dashboard_trans.TYPE')}} --</option>
                                                @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @error("store.type_id") <span class="error">{{ $message }}</span> @enderror
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

        window.addEventListener('deleteMode', (e) => {
            $('#delete_qa'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div> <!-- container-fluid -->
