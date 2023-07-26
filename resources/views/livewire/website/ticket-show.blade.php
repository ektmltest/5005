<section id="blog-pp" class="blog-pp single-pp">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-2"></div>
            <div class="col-lg-8 col-sm-12">
                <!-- Start Post -->
                <div class="post-item comment-box">
                    <div class="post-txt">
                        <a class="post-title wordsBreaker">{{$ticket->title}}</a>
                        <ul class="list-unstyled post-details wordsBreaker">
                            <div class="comment-head">
                                <div class="member-info">
                                    <div class="member-img">
                                        <img class="img-fluid" src="https://www.ektml.com/avatar/user/719" alt="Avatar">
                                    </div>
                                    <div class="member-name">
                                        <h6>
                                            <a>{{$ticket->user->full_name}}</a>
                                            <span><i class="bx bxs-circle" style="font-size: 6px"></i> {{$ticket->user->rank->name}}</span>
                                        </h6>
                                        <span class="date">{{$ticket->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <p class='mt-3 wordsBreaker'>{{$ticket->description}}
                        </p>
                        <div id="attachments" class="mt-2">
                        </div>

                        <div class="footer-post">
                            <div class="tags">
                                <a>{{$ticket->type->name}}</a>
                            </div>
                            <div class="action-post">
                                <a onclick="topbar.show()" wire:click='closeTicket' class="btn btn-danger text-light rounded-pill" id="246"><i class='bx bxs-x-circle'></i> {{__('tickets_trans.close the ticket')}}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="post-comments mt-4">
                        <ul class="list-unstyled">
                            <!-- Start Comment -->
                            <li class="comment-inner">
                                <ul class="replies" id="repliesSec">
                                </ul>

                            </li>
                        </ul>
                    </div>


                    <!-- Start Leave Comment -->
                    <div class="leave-comment">
                        <h5><i class="bx bx-comment-detail"></i> إضافة رد</h5>
                        <form action="https://www.ektml.com/tickets/reply/246" name="addreply" method="POST"
                            autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <textarea class="floating-label-field floating-label-field--s3" id="reply"
                                                name="reply" placeholder=""></textarea>
                                            <label for="reply" class="floating-label">رسالتك</label>
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
                                        <input type="submit" id="attachAdd" value="إضافة مرفق"
                                            style="padding: 10px 25px !important;">
                                    </div>
                                </div>
                                <div class="form-buttons">
                                    <input type="submit" class="mt-1" value="رد">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Leave Comment -->
                </div>
                <!-- End Post -->
            </div>
        </div>
    </div>
    </div>
</section>
