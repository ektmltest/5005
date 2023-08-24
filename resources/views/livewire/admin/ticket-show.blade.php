<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ __('dashboard_trans.TICKET SYSTEM') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Tickets Management') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{strtoupper(__('tickets_trans.title'))}}</h5>
                                <div class="text-secondary font-size-20">{{$ticket->title}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{strtoupper(__('dashboard_trans.id'))}}</h5>
                                <div class="text-secondary font-size-20">{{$ticket->id}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->


            <div class="row">
                <div class="col-xl-8">
                    {{-- ? project description --}}
                    <div class="card checkout-order-summary">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle ml-2" width="50" height="50" src="{{$ticket->user->avatar}}" alt="">
                                    <div style="width: 20px"></div>
                                    <div class="mt-2">
                                        <p class="mb-1 pt-1">{{$ticket->user->full_name}}</p>
                                        <p class="tx-11 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg pb-3px"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                            {{\App\Helpers\Date::formatDate($ticket->created_at)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <p class="text-secondary font-size-15">{{$ticket->description}}</p>
                            </div>
                        </div>

                        @if ($ticket->attachments->count())

                        <div class="card-footer font-size-13">
                            <div class="row">
                                <div>{{__('myprojects_trans.attachments')}}: </div>
                                @foreach ($ticket->attachments as $attachment)
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left icon-sm text-muted"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    <a href="{{$attachment->file}}" target="_blank">{{$attachment->filename}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @endif
                    </div>

                    {{-- ? old replies --}}
                    @foreach ($replies as $reply)

                        @if ($loop->first)
                            <h5><i class="fa fa-reply-all"></i> {{__('dashboard_trans.replies')}} ({{$loop->count}})</h5>
                        @endif

                        <div class="card checkout-order-summary mt-3">

                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="img-xs rounded-circle ml-2" width="50" height="50" src="{{$reply->user->avatar}}" alt="">
                                        <div style="width: 20px"></div>
                                        <div class="mt-2">
                                            <p class="mb-1 pt-1">{{$reply->user->full_name}}</p>
                                            <p class="tx-11 text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg pb-3px"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reply->created_at)->format('D d, M, Y g:i A')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <p class="text-secondary font-size-15">{{$reply->message}}</p>
                                </div>
                            </div>

                            @if ($reply->attachments->count())

                            <div class="card-footer font-size-13">
                                <div class="row">
                                    <div>{{__('myprojects_trans.attachments')}}: </div>
                                    @foreach ($reply->attachments as $attachment)
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left icon-sm text-muted"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                        <a href="{{$attachment->file}}" target="_blank">{{$attachment->filename}}</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            @endif
                        </div>

                    @endforeach

                    @if ($replies->count() < $max_count)
                    <div class="mt-3">
                        <a onclick="topbar.show()" style="cursor: pointer" class="btn btn-outline-secondary" wire:click='loadMore'>
                            <i class="fa fa-arrow-down"></i> {{__('main_trans.load more')}}
                        </a>
                    </div>
                    @endif

                    @if ($ticket->status == 'available')
                    {{-- ? create reply --}}
                    <div class="card checkout-order-summary mt-3">
                        <div class="card-header">
                            <h5><i class="fa fa-reply"></i> {{__('myprojects_trans.reply')}}</h5>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='reply'>
                                <div class="form-group">
                                    <label for="message" class="mb-3">{{__('home_trans.Message')}}</label>
                                    <textarea wire:model='message' id="message" class="form-control" rows="5" style="resize: none"></textarea>
                                    @error("message") <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div id="attachments">
                                    @for ($i = 0; $i < $noFiles; $i++)
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-8">
                                                <div class="floating-label-wrap">
                                                    <label for="attachInput{{$i}}" class="floating-label">
                                                        {{ucwords(__('tickets_trans.attachment'))}}
                                                        <div id="profile-image-spinner{{$i}}" class="spinner-border spinner-border-sm text-primary d-none" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </label> <br>
                                                    <input wire:model='files.{{$i}}' oninput="topbar.show();" type="file" class="floating-label-field floating-label-field--s3" id="attachInput{{$i}}" />

                                                    @if ($i == $noFiles - 1)
                                                    <input onclick="topbar.show()" wire:click='addBtn' type="button" value="{{ucwords(__('tickets_trans.add attachment'))}}" id="addAttachBtn" class="btn btn-primary">
                                                    @endif
                                                </div>
                                            </div>
                                            @error('files')
                                                <span class="error">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @endfor
                                </div>

                                <div id="profile-image-spinner" wire:loading class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <button wire:loading.attr='disabled' class="btn btn-outline-success mt-3" type="submit">{{__('dashboard_trans.ADD')}} <i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- ? project details --}}
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{strtoupper(__('dashboard_trans.main info'))}}</h5>
                                <hr class="border-dark">
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.CREATED AT'))}}</p>
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg pb-3px"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    {{\App\Helpers\Date::formatDate($ticket->created_at)}}
                                </p>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.ticket participants'))}}</p>
                                @foreach ($participants as $participant)
                                <img class="img-xs rounded-circle ml-2"
                                    width="50" height="50"
                                    src="{{$participant['avatar']}}"
                                    alt="participant"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="{{$participant['full_name']}}">
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('tickets_trans.type'))}}</p>
                                <p><span style="font-weight: bolder" class="badge bg-primary text-light">{{$ticket->type->name}}</span></p>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.STATUS'))}}</p>
                                <p>
                                    <span style="font-weight: bolder"
                                    class="badge bg-{{$ticket->status == 'available' ? 'success' : 'danger'}} text-light">
                                        {{__("dashboard_trans.$ticket->status")}}
                                    </span>
                                </p>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.ACTIONS'))}}</p>
                                <p>
                                    @if ($ticket->status == 'available')
                                    <button id="close-ticket-btn" class="btn btn-outline-danger" style="font-weight: bolder">{{__('tickets_trans.close the ticket')}}</button>
                                    <input id="actual-close-ticket-btn" type="hidden" name="" wire:click='closeTicket'>
                                    @else
                                    <span>{{__('dashboard_trans.NO ACTIONS')}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

        </div>
    </div>

    @if ($ticket->status == 'available')
    <script>
        document.getElementById('close-ticket-btn').addEventListener('click', () => {
            Swal.fire({
                title: "{{ucwords(__('messages.are you sure?'))}}",
                showCancelButton: true,
                confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                cancelButtonText: "{{ucwords(__('messages.no'))}}",
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    topbar.show();
                    document.getElementById('actual-close-ticket-btn').click();
                }
            })
        });
    </script>
    @endif
</div>
