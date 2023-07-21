<section id="single-job" class="single-job">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sidebox sidebox-style">
                    <h5><i class="bx bx-rename"></i> {{__('myprojects_trans.project id')}}</h5>
                    <div class="sidebox-inner text-center txt-widget">
                        <h4 class="text-muted h6 cutText">{{$project->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebox sidebox-style">
                    <h5><i class="bx bx-hash"></i> {{__('myprojects_trans.project name')}}</h5>
                    <div class="sidebox-inner text-center txt-widget">
                        <h4 class="text-muted h6">{{$project->id}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 order-2 order-lg-1">
                <div class="side-description-form">
                    <div class="job-description">
                        <div class="box-details comment-box">
                            <ul class="list-unstyled post-details wordsBreaker">
                                <div class="comment-head">
                                    <div class="member-info">
                                        <div class="member-img">
                                            <img class="img-fluid" src="{{$project->user->avatar}}" alt="Avatar">
                                        </div>
                                        <div class="member-name">
                                            <h6>
                                                <a role="button">{{$project->user->full_name}}</a>
                                                <span>
                                                    <i class="bx bxs-circle" style="font-size: 6px"></i>
                                                    {{$project->user->rank->name}}
                                                </span>
                                            </h6>
                                            <span class="date">{{$project->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                            <p class="mt-3 wordsBreaker">{{$project->description}}</p>
                            <div id="attachments" class="mt-2">
                                <hr>
                                <small class="text-muted"> {{__('myprojects_trans.attachments')}}:</small>
                                <br>
                                @foreach ($project->attachments as $attachment)
                                <span>
                                    <i class="bx bxs-chevron-left text-muted"></i>
                                    <small>
                                        <a target="_blank" href="{{$attachment->file}}">
                                            <i class="bx bx-file"></i> {{$attachment->filename}}
                                        </a>
                                    </small>
                                    <br>
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="post-comments mt-4" id="projectCommentsSection">
                        <ul class="list-unstyled">
                            <li class="comment-inner">
                                <ul>
                                    <h5 id="repliesCount">
                                        <i class="bx bx-reply-all"></i>
                                        <span>الردود ({{count($project->replies)}})</span>
                                    </h5>
                                </ul>
                                <ul class="replies" id="projectReplies">
                                    @foreach ($project->replies as $reply)
                                    <li class="comment-inner" style="">
                                        <div class="comment-box">
                                            <div class="list-unstyled post-details wordsBreaker">
                                                <div class="comment-head">
                                                    <div class="member-info">
                                                        <div class="member-img">
                                                            <img class="img-fluid" src="{{$reply->user->avatar}}"
                                                                alt="Avatar">
                                                        </div>
                                                        <div class="member-name">
                                                            <h6>
                                                                <a href="javascript:;">{{$reply->user->full_name}}</a>
                                                                <span class="text-{{$reply->user->rank->type->color}}"
                                                                    style="display: contents;"><i class="bx bxs-circle"
                                                                        style="font-size: 6px"></i>
                                                                    {{$reply->user->rank->name}}</span>
                                                            </h6>
                                                            <span
                                                                class="date">{{$reply->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-body">
                                                <p class="wordsBreaker">{{$reply->message}}</p>
                                            </div>

                                            @if (count($reply->attachments) > 0)
                                            <div id="attachments" class="mt-2">
                                                <hr>
                                                <small class="text-muted"> {{__('myprojects_trans.attachments')}}:</small>
                                                <br>
                                                <span>
                                                    @foreach ($reply->attachments as $attachment)
                                                    <i class="bx bxs-chevron-left text-muted"></i>
                                                    <small>
                                                        <a target="_blank" href="{{$attachment->file}}"><i
                                                                class="bx bx-file"></i> {{$attachment->filename}}
                                                        </a>
                                                    </small>
                                                    <br>
                                                    @endforeach
                                                </span>
                                            </div>
                                            @endif

                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form wire:submit.prevent='submit' autocomplete="off" class="form-box box-application"
                        id="sendReply">
                        <input name="projectId" hidden="" value="153">
                        <h4>{{__('myprojects_trans.reply')}}</h4>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="floating-label-wrap">
                                        <textarea wire:model='message'
                                            class="floating-label-field floating-label-field--s3" name="projectReply"
                                            id="projectReply" maxlength="1536" placeholder="{{__('myprojects_trans.reply')}}"></textarea>
                                        <label for="field-1" class="floating-label">{{__('myprojects_trans.reply')}}</label>

                                        @error('message')
                                        <div class="text-danger">
                                            * {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="col-sm-12">
                                    <label for="inputAttachments">{{__('myprojects_trans.attachments')}}:</label>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                @for ($i = 0; $i < $noFiles; $i++) <div class="form-group col-xl-12 mt-5">
                                    <div class="floating-label-wrap">
                                        <input wire:model='files.{{$i}}' type="file"
                                            class="floating-label-field floating-label-field--s3"
                                            id="attachInput{{$i}}" />
                                        <label for="attachInput{{$i}}"
                                            class="floating-label">{{ucwords(__('tickets_trans.attachment'))}}</label>
                                    </div>
                            </div>
                            @error("files.$i")
                            <span class="text-danger">* {{$message}}</span>
                            @enderror
                            @endfor
                        </div>

                        <div class="form-group col-md-4">
                            <div class="floating-label-wrap">
                                <div class="form-buttons">
                                    <input onclick="topbar.show()" wire:click='addBtn' type="button"
                                        value="{{ucwords(__('tickets_trans.add attachment'))}}" id="addAttachBtn">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 mt-2">
                            <div class="form-bttns">
                                <button onclick='topbar.show()' class="bttn btn btn-purple" type="submit">
                                    {{__('home_trans.Submit')}} </button>
                            </div>
                        </div>
                </div>
                </form>
                <!-- End Job Application -->
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 order-1 order-lg-2">
            <aside class="aside-bar" style="">
                <div class="job-sidebar">
                    <div class="apply-bttn">
                        <button wire:click='delete' onclick="return confirm('Are you sure to delete this project?')"
                            class="btn bttn btn-danger text-light w-100 justify-content-around" role="button">
                            {{__('dashboard_trans.Delete')}} </button>
                    </div>
                    <div class="job-info">
                        <h6>{{__('myprojects_trans.project details')}}</h6>
                        <ul class="list-unstyled">
                            <li>{{__('dashboard_trans.Project Department')}}<span>{{$project->department()->name}}</span></li>
                            <li>{{__('dashboard_trans.CREATED AT')}}
                                <span>{{date('M d Y, H:i a', strtotime($project->created_at))}}</span>
                            </li>
                            <li>
                                {{__('dashboard_trans.Projects categories')}}
                                <span>
                                    @foreach ($project->categories as $category)
                                    <p class="badge text-light badge-{{$category->color}}">
                                        {{$category->name}}
                                    </p>
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                {{__('dashboard_trans.STATUS')}}
                                <span class="badge text-light badge-{{$project->state->color}}">
                                    {{$project->state->name}}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    </div>
</section>
