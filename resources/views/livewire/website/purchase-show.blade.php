<section id="blog-pp" class="blog-pp single-pp">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-2"></div>
            <div class="col-lg-8 col-sm-12">
                <!-- Start Post -->
                <div class="post-item comment-box">
                    <div class="post-txt">
                        <a class="post-title wordsBreaker mb-4">{{$purchase->project->name}} - {{__('tickets_trans.purchase operation')}}</a>
                        <ul class="list-unstyled post-details wordsBreaker">
                            <div class="comment-head">
                                <div class="member-info">
                                    <div class="member-img">
                                        <img src="{{$purchase->user->avatar}}" alt="Avatar">
                                    </div>
                                    <div class="member-name">
                                        <h6>
                                            <a>{{$purchase->user->full_name}}</a>
                                            <span><i class="bx bxs-circle" style="font-size: 6px"></i>
                                                {{$purchase->user->rank->name}}</span>
                                        </h6>
                                        <span class="date">{{$purchase->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <p class='mt-3 wordsBreaker'>{{__('tickets_trans.you have bought a project')}} - {{$purchase->project->name}}</p>
                        <p class='mt-3 wordsBreaker'>{{__('tickets_trans.with price')}} {{$purchase->full_price}}</p>
                        <p class='mt-3 wordsBreaker'>
                            @forelse ($purchase->addons as $addon)
                                @if ($loop->first)
                                    {{__('tickets_trans.and select the following addons')}}:
                                @endif

                                @if ($loop->last)
                                    {{$addon->name}}.
                                @else
                                    {{$addon->name}},
                                @endif
                            @empty
                                {{__('tickets_trans.without addons')}}.
                            @endforelse
                        </p>

                        <div class="footer-post">
                            <div class="tags" style="font-weight: bold">
                                <a>{{__('tickets_trans.purchases')}}</a>
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="post-comments mt-4">
                        <ul class="list-unstyled">
                            <!-- Start Comment -->
                            <li class="comment-inner">
                                <ul class="replies" id="repliesSec">
                                    <li class="comment-inner">
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <div class="member-info">
                                                    <div class="member-img" style="border: 1px solid #4b3da7">
                                                        <img src="{{asset('assets/img/logo_ektml.webp')}}" width="100%" height="100%" class="p-2" alt="Avatar">
                                                    </div>
                                                    <div class="member-name">
                                                        <h6>
                                                            <a href="javascript:;">{{__('main_trans.Ektml')}}</a>
                                                            <span style="display: contents;"><i class="bx bxs-circle"
                                                                    style="font-size: 6px"></i>
                                                                bot
                                                            </span>
                                                        </h6>
                                                        <span
                                                            class="date">{{$purchase->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-body wordsBreaker">
                                                <p class="wordsBreaker">
                                                    {{__('tickets_trans.thanks for trust us')}}:
                                                </p>
                                                <p class="wordsBreaker">
                                                    1 - {{__('tickets_trans.website name')}}
                                                </p>
                                                <p class="wordsBreaker">
                                                    ( {{__('tickets_trans.example website neom')}} )
                                                </p>
                                                <p class="wordsBreaker">
                                                    2 - {{__('tickets_trans.website link')}}
                                                </p>
                                                <p class="wordsBreaker">
                                                    ( {{__('tickets_trans.example')}} : Neom.com )
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    @foreach ($purchase->replies()->orderBy('created_at')->get() as $reply)
                                    <li class="comment-inner">
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <div class="member-info">
                                                    <div class="member-img">
                                                        <img src="{{$reply->user->avatar}}" alt="Avatar">
                                                    </div>
                                                    <div class="member-name">
                                                        <h6>
                                                            <a href="javascript:;">{{$reply->user->full_name}}</a>
                                                            <span style="display: contents;"><i class="bx bxs-circle"
                                                                    style="font-size: 6px"></i>
                                                                {{$reply->user->rank->name}}
                                                            </span>
                                                        </h6>
                                                        <span
                                                            class="date">{{$reply->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-body wordsBreaker">
                                                <p class="wordsBreaker">
                                                    {{$reply->message}}</p>
                                            </div>

                                            @if ($reply->attachments()->count() > 0)
                                            <div id="attachments" class="mt-2">
                                                <hr>
                                                <small class="text-muted">
                                                    {{__('myprojects_trans.attachments')}}:</small>
                                                @foreach ($reply->attachments as $attachment)
                                                <br>
                                                <small>
                                                    <i class="bx bxs-chevron-left text-muted"></i>
                                                    <small>
                                                        <a href="{{$attachment->file}}" target="_blank">
                                                            <i class="bx bx-file"></i> {{$attachment->filename}}
                                                        </a>
                                                    </small>
                                                    <br>
                                                </small>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Start Leave Comment -->
                    <div class="leave-comment">
                        <h5><i class="bx bx-comment-detail"></i> {{__('myprojects_trans.reply')}}</h5>
                        <form wire:submit.prevent='reply' autocomplete="off">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <textarea wire:model='message'
                                                class="floating-label-field floating-label-field--s3"></textarea>
                                            <label for="reply"
                                                class="floating-label">{{__('home_trans.Message')}}</label>
                                            @error('message')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    @for ($i = 0; $i < $noFiles; $i++)
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <div class="floating-label-wrap">
                                                <input wire:model='files.{{$i}}' oninput="topbar.show();" type="file"
                                                    class="floating-label-field floating-label-field--s3"
                                                    id="attachInput{{$i}}" />
                                                <label for="attachInput{{$i}}"
                                                    class="floating-label">
                                                    {{ucwords(__('tickets_trans.attachment'))}}
                                                </label>
                                            </div>
                                        </div>
                                        @error("files.$i")
                                        <span class="text-danger mb-5">* {{$message}}</span>
                                        @enderror
                                    </div>
                                    @endfor
                                </div>

                                <div class="form-group col-md-4">
                                    <div class="floating-label-wrap">
                                        <div class="form-buttons">
                                            <input onclick="topbar.show()" wire:click='addBtn' type="button"
                                                value="{{ucwords(__('tickets_trans.add attachment'))}}"
                                                id="addAttachBtn">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-buttons">
                                <div id="profile-image-spinner" wire:loading class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <input wire:loading.attr='disabled' onclick="topbar.show()" type="submit" class="mt-1"
                                    value="{{__('myprojects_trans.reply')}}">
                            </div>
                        </form>
                    </div>
                    <!-- End Leave Comment -->
                </div>
                <!-- End Post -->
            </div>
        </div>
    </div>
</section>
