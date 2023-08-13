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
                <div class="col-xl-8">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{__('dashboard_trans.PROJECT NAME')}}</h5>
                                <div class="text-secondary font-size-20">{{$project->name}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{__('myprojects_trans.project id')}}</h5>
                                <div class="text-secondary font-size-20">{{$project->id}}</div>
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
                                    <img class="img-xs rounded-circle ml-2" width="50" height="50" src="{{$project->user->avatar}}" alt="">
                                    <div style="width: 20px"></div>
                                    <div class="mt-2">
                                        <p class="mb-1 pt-1">{{$project->user->full_name}}</p>
                                        <p class="tx-11 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg pb-3px"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                            {{\App\Helpers\Date::formatDate($project->created_at)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <p class="text-secondary font-size-15">{{$project->description}}</p>
                            </div>
                        </div>

                        @if ($project->attachments->count())

                        <div class="card-footer font-size-13">
                            <div class="row">
                                <div>{{__('myprojects_trans.attachments')}}: </div>
                                @foreach ($project->attachments as $attachment)
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left icon-sm text-muted"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    <a href="{{$attachment->file}}">{{$attachment->filename}}</a>
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
                                                    <label for="attachInput{{$i}}" class="floating-label">{{ucwords(__('tickets_trans.attachment'))}}</label> <br>
                                                    <input wire:model='files.{{$i}}' type="file" class="floating-label-field floating-label-field--s3" id="attachInput{{$i}}" />

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

                                <button class="btn btn-outline-success mt-3" type="submit">{{__('dashboard_trans.ADD')}} <i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ? project details --}}
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{strtoupper(__('myprojects_trans.project details'))}}</h5>
                                <hr class="border-dark">
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{__('dashboard_trans.DEPARTMENT')}}</p>
                                <p>{{$project->department->name}}</p>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{__('dashboard_trans.CREATED AT')}}</p>
                                <p>
                                    {{\App\Helpers\Date::formatDate($project->created_at)}}
                                </p>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.categories'))}}</p>
                                @foreach ($project->categories as $category)
                                <span class="badge bg-{{$category->color}}">{{$category->name}}</span>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.progress'))}}</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$project->progress}}%" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <p style="font-weight: bolder">{{strtoupper(__('dashboard_trans.project state'))}}</p>
                                <p class="d-block text-center badge bg-{{$project->state->color}}">{{$project->state->name}} {{$project->state->id}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-size-20" style="font-weight: bolder">{{strtoupper(__('dashboard_trans.project settings'))}}</h5>
                                <hr class="border-dark">
                            </div>

                            <div class="mt-3">
                                <label style="font-weight: bolder">{{strtoupper(__('dashboard_trans.project state'))}}</label>
                                <select class="form-control" wire:model='settings.state_id' wire:change='changeSettings' onchange="topbar.show()">
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}" class="text-{{$state->color}}">{{$state->name}} {{$state->id}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label style="font-weight: bolder">{{strtoupper(__('dashboard_trans.progress'))}}</label>
                                <br>
                                <div class="row justify-content-between">
                                    <input class="col-8" type="range" wire:model='settings.progress' wire:change='changeSettings' onchange="topbar.show()">
                                    <div class="col-4" style="text-align: left"><span class="badge bg-primary">{{$settings['progress']}}%</span></div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label style="font-weight: bolder">{{strtoupper(__('dashboard_trans.PRICE'))}}</label>
                                <br>
                                <input type="number" class="form-control" wire:model='settings.price' wire:change='changeSettings' onchange="topbar.show()">
                                <span class="text-info">* ({{__('dashboard_trans.START PRICE')}}: {{$project->calculated_price}} {{__('home_trans.SAR')}})</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

        </div>
    </div>
</div>
