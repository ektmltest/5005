<section id="single-job" class="single-job">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sidebox sidebox-style">
                    <h5><i class="bx bx-rename"></i> إسم المشروع</h5>
                    <div class="sidebox-inner text-center txt-widget">
                        <h4 class="text-muted h6 cutText">{{$project->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebox sidebox-style">
                    <h5><i class="bx bx-hash"></i> الرقم المرجعي للمشروع</h5>
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
                                            <img class="img-fluid" src="https://www.ektml.com/avatar/user/719"
                                                alt="Avatar">
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
                                <small class="text-muted"> المرفقات:</small>
                                <br>
                                @foreach ($project->attachments as $attachment)
                                <span>
                                    <i class="bx bxs-chevron-left text-muted"></i>
                                    <small>
                                        <a href="{{env('APP_URL') . '/' . $attachment->file}}">
                                            <i class="bx bx-file"></i> {{explode('/',
                                            $attachment->file)[count(explode('/', $attachment->file)) - 1]}}
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
                                                            <img class="img-fluid"
                                                                src="https://www.ektml.com/avatar/user/719"
                                                                alt="Avatar">
                                                        </div>
                                                        <div class="member-name">
                                                            <h6>
                                                                <a href="javascript:;">{{$reply->user->full_name}}</a>
                                                                <span style="display: contents;"><i
                                                                        class="bx bxs-circle"
                                                                        style="font-size: 6px"></i>{{$reply->user->rank->name}}</span>
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
                                            <div id="attachments" class="mt-2">
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="https://www.ektml.com/projects/addReply" autocomplete="off"
                        class="form-box box-application" id="sendReply">
                        <input name="projectId" hidden="" value="153">
                        <h4>الرد على المشروع</h4>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="floating-label-wrap">
                                        <textarea class="floating-label-field floating-label-field--s3"
                                            name="projectReply" id="projectReply" maxlength="1536"
                                            placeholder="تفاصيل الرد"></textarea>
                                        <label for="field-1" class="floating-label">تفاصيل الرد</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="col-sm-12">
                                    <label for="inputAttachments">المرفقات:</label>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="row form-group">
                                    <div class="col-sm-12" id="theAttachments">
                                        <input type="file" name="attachments[]" id="inputAttachments"
                                            class="form-control">
                                    </div>
                                    <div class="col-xs-12 text-muted">
                                        إمتدادات الملفات المرفقة المسموح بها: .jpg, .gif, .jpeg, .png, .pdf </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-buttons">
                                    <input type="button" class="btn bttn btn-purple"
                                        id="attachAdd" value="إضافة مرفق" style="padding: 10px 25px !important;">
                                </div>
                            </div>
                            <div class="col-xl-12 mt-2">
                                <div class="form-bttns">
                                    <button class="bttn btn btn-purple" type="submit">
                                        إرسال الرد </button>
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
                                إلغاء المشروع </button>
                        </div>
                        <div class="job-info">
                            <h6>تفاصيل المشروع الرئيسية</h6>
                            <ul class="list-unstyled">
                                <li>القسم<span>{{$project->department()->name}}</span></li>
                                <li>تم إنشاء المشروع في
                                    <span>{{date('M d Y, H:i a', strtotime($project->created_at))}}</span>
                                </li>
                                <li>
                                    الفئات
                                    <span>
                                        @foreach ($project->categories as $category)
                                        <p class="badge text-light badge-info">
                                            {{$category->name}}
                                        </p>
                                        @endforeach
                                    </span>
                                </li>
                                <li>
                                    حالة المشروع
                                    <span class="badge text-light badge-secondary">
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
